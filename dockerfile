FROM php:8.2-apache

WORKDIR /var/www/html

COPY index.php index.php

COPY db.php db.php

COPY style.css style.css

RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 80