FROM php:8.0-fpm-alpine

WORKDIR /var/www/app

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY --chown=www-data:www-data . /var/www/app

RUN composer instal --no-cache

USER www-data

EXPOSE 9000

CMD ["php-fpm"]
