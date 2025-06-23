# 📂 File: docker/php/Dockerfile
# 🎯 Purpose: PHP + Composer + Laravel optimized

# Stage 1: Composer only
FROM composer:latest AS composer

# Stage 2: Laravel PHP container
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    libcurl4-openssl-dev libssl-dev libjpeg-dev libfreetype6-dev \
    redis supervisor \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
