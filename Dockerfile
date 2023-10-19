FROM php:8.1-fpm

RUN docker-php-ext-install pdo pdo_mysql sockets
# RUN docker-php-ext-install gd
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1

# RUN composer update
RUN composer install --ignore-platform-reqs
RUN php artisan jwt:secret
# RUN php artisan migrate --seed

CMD php artisan serve --host=0.0.0.0 --port=8000
# FROM php:8.2-fpm-alpine

# RUN docker-php-ext-install pdo pdo_mysql sockets
# RUN curl -sS https://getcomposer.org/installer | php -- \
#      --install-dir=/usr/local/bin --filename=composer

# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# WORKDIR /app
# COPY . .

# RUN composer install
# RUN php artisan jwt:secret
# RUN php artisan migrate --seed

# CMD php artisan serve --host=0.0.0.0 --port=8000
