FROM php:8.4-fpm

# Install system dependencies & Nginx
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    curl \
    zip \
    libxml2-dev \
    libicu-dev \
    libssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy Composer from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy codebase
COPY . /var/www

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set write permissions for Laravel storage & cache
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Copy custom Nginx configuration pointing to public folder
COPY docker/nginx.conf /etc/nginx/sites-available/default

EXPOSE 10000

# Remove any pre-existing environment or installed flag to force installer mode
CMD rm -f /var/www/storage/installed /var/www/.env && \
    php-fpm -D && \
    nginx -g 'daemon off;'
