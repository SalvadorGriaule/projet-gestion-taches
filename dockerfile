FROM php:8.2-apache

WORKDIR /var/www/html



COPY index.php index.php

COPY db.php db.php

RUN apt-get install -y libmcached-dev zlib1g-dev &&
    pecl install memcached-3.1.5 &&
    docker-php-ext-enable memcached

EXPOSE 80