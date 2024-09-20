FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libz-dev \
    libmemcached-dev \
    zlib1g-dev \
    libssl-dev \
    supervisor \
    && docker-php-ext-install pdo pdo_mysql gd zip

RUN pecl install memcached redis \
    && docker-php-ext-enable memcached redis

#RUN useradd -m -s /bin/bash www-data

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN chown -R www-data:www-data /var/www /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

CMD ["sh", "-c", "cp .env.example .env & composer install && php artisan queue:work --daemon & php-fpm"]
