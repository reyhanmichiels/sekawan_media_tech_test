FROM php:8.2-fpm

RUN apt-get update && apt-get install -y libzip4 libzip-dev libpng-dev libjpeg-dev libfreetype6-dev zip unzip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN chown -R www-data:www-data /app/storage /app/bootstrap
RUN composer install --no-dev
RUN php artisan jwt:secret

CMD php artisan serve --host=0.0.0.0 --port=8000