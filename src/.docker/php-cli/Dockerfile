FROM php:8.0.3-fpm

RUN set -ex; \
        \
        # Image build dependencies
        apt update; \
        # Install Redis extension
        pecl install redis; \
        docker-php-ext-enable redis; \
        # Install PDO extension
        docker-php-ext-install pdo pdo_mysql

WORKDIR /app
