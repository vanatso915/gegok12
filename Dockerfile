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
    ca-certificates \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Node.js (LTS version)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && node -v \
    && npm -v

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN chmod +x /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Fix Git "dubious ownership" issue automatically
RUN git config --system --add safe.directory /var/www

# Copy codebase
COPY . /var/www

# Install PHP dependencies during build
RUN composer install --no-dev --optimize-autoloader

# Create Composer home directory & grant permissions for www-data & Nginx
RUN mkdir -p /var/www/.composer && \
    chown -R www-data:www-data /var/www /var/www/.composer && \
    chmod -R 775 /var/www/storage /var/www/bootstrap/cache /var/www/.composer

# Copy custom Nginx configuration pointing to public folder
COPY docker/nginx.conf /etc/nginx/sites-available/default

EXPOSE 10000

# Start PHP-FPM and Nginx, preventing lock file blocks
CMD rm -f /var/www/storage/installed && \
    php-fpm -D && \
    nginx -g 'daemon off;'
