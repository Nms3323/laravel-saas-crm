FROM php:8.2-fpm
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y zlib1g-dev libzip-dev unzip git
RUN docker-php-ext-install pdo pdo_mysql
COPY . /var/www/html
