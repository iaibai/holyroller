FROM php:7.4-apache

ENV APACHE_DOCUMENT_ROOT /var/www/public

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN pecl install redis
RUN docker-php-ext-enable redis

COPY . /var/www
RUN chmod -R 777 /var/www/storage
RUN chmod -R 777 /var/www/bootstrap/cache

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
