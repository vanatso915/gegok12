<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

  'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET SESSION sql_require_primary_key=0;",
                PDO::MYSQL_ATTR_SSL_CA => "-----BEGIN CERTIFICATE-----\n" .
                    "MIIERDCCAqygAwIBAgIUbUfpqr9CuPSX04Hd1ArV+Cleg60wDQYJKoZIhvcNAQEM\n" .
                    "BQAwOjE4MDYGA1UEAwwvYjQ2M2ZlNzQtZWNmMS00MTEwLWFiZWEtOWU5YmQ3ODU0\n" .
                    "NGZjIFByb2plY3QgQ0EwHhcNMjYxMDIxMDMyNjA4WhcNMzYxMDE4MDMyNjA4WjA6\n" .
                    "MTgwNgYDVQQDDC9iNDYzZmU3NC1lY2YxLTQxMTAtYWJlYS05ZTliZDc4NTQ0ZmMg\n" .
                    "UHJvamVjdCBDQTCCAaIwDQYJKoZIhvcNAQEBBQADggGPADCCAYoCggGBAKFX3jHl\n" .
                    "25YAJbEjz0Wc7e7rmkt5IGf/CqE6OmG7wB+5XgEwnMIBcNSVcBsVki+tecW21RSQ\n" .
                    "V1KyajOeNLddTxnaq5teC0BfL3k5RLg61ouXFyyRPFEn8Qsgubm+VSBai64y8AE9\n" .
                    "62cAduDY1+HcIcvA1TWr6zVIDadgFHHlYef/bAw6wA4nWHI504R6seuXae+16nh5\n" .
                    "59BLPeOyPFMYiu+igiC97rQnISk9hDKyBXiIh7cJ1CIE7FAJWVZmbfqHxjdjJVkr\n" .
                    "ua95+6GGYH0a6qGeIAUM9w8ay1B4hHSyIOTPuNIHSZ/Pjn9ErLhRFAB+zbjm7FfJ\n" .
                    "hd6rwo5t1H3riU2ORtntcbLYlRkYqFIw6jUJgdg8MCSaBSR94PuZmv1toSn+inTO\n" .
                    "+7syYpjKKK6TxEDpNYIvtLHgeMPYuCXAfIyfMwyjjGd0KqzmiiGda55SV9XpIw1o\n" .
                    "zN2gAOm0z6FAR1uwTmjTQlLI7KSkJWgjJ+Vg645iNfy0ga7NJnbQByzByQIDAQAB\n" .
                    "o0IwQDAdBgNVHQ4EFgQUzLdKB+olpUjmddFWUz4kB8aFp8IwEgYDVR0TAQH/BAgw\n" .
                    "BgEB/wIBADALBgNVHQ8EBAMCAQYwDQYJKoZIhvcNAQEMBQADggGBAJUIpY3RdRGg\n" .
                    "sp5OgAV5YQf01WRtb3KVNj5pmlnR81tYPV9sjrwFnQ0xAkZx0h/MRTc5WHr8l2pU\n" .
                    "+l2H0+ksAE30gN1marGgngmwe7Zb+zOSECgvjkfqgGZGa5xyOHFIkA9yiSAxE8QT\n" .
                    "TMcN7AtYjpomgXxvtz+YE1JDcxRKOZnx2OH1bsOXhK3H+c7vh/d7BsudyxqXiWHG\n" .
                    "cqqZzu1+6ErXiQ8OxaXLb9o2dgAWKMu1U1gl7VrcOjhS1x7A0Q9L8ij2YRO40akJ\n" .
                    "9yvTRCRPhL2O+GCgRVKInLYKOstkFxKRT6mNSMjCnAAm1KDPetoxhUQ12gOZpimv\n" .
                    "8xaEyV00G+tlU7L5ajef8b0s7NQRWfodaw6w9u/6pAO1Lc6WnpI5On1N9kUFfGMA\n" .
                    "JMdFChr80f27s987KHy+4PQoNRIvBGRl/6idUELBS5eWDCe+x9+kRq0iYRdvZawe\n" .
                    "on9ndMM7MoKbTNsDe4ngbMjisuOmdiIkbhOSpyK9n2raKD9IXW25oA==\n" .
                    "-----END CERTIFICATE-----",
            ]) : [],
        ],
    
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
