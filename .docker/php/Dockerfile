FROM php:8.2-fpm

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libzip-dev libicu-dev \
    && docker-php-ext-install pdo_mysql mbstring zip intl gd opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Composer dentro del contenedor PHP 8.2
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia el código
COPY . .

# Instala dependencias de Laravel con el PHP 8.2 del contenedor
RUN composer install --no-dev --no-progress --no-interaction --prefer-dist

# Permisos
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

