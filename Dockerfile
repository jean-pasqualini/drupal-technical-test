# Stage final
FROM php:fpm

RUN apt-get update && apt-get install -y \
        zip \
        git \
        libpng-dev \
        libjpeg-dev \
        libzip-dev \
        libonig-dev \
        default-mysql-client \
        libicu-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        gd \
        opcache \
        mbstring \
        zip \
        intl

COPY ./wait-for-it.sh /wait-for-it.sh
RUN chmod +x /wait-for-it.sh
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
