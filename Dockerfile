FROM php:8.1.12-apache as php

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y\
    zip\
    unzip\
    git\
    curl\
    libpng-dev\
    libonig-dev\
    libxml2-dev

RUN git config --global core.autocrlf input
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

RUN docker-php-ext-install\
    pdo_mysql\
    mbstring\
    bcmath\
    mysqli\
    gd

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.lock composer.json /var/www/html/

COPY . .
RUN chmod +x Docker/entrypoint.sh
ENV PORT=8000