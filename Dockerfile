FROM php:8.2 as php
RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev 
RUN docker-php-ext-install pdo pdo_mysql bcmath

WORKDIR /var/www
COPY . .

COPY --from=composer:2.6.3 /usr/bin/composer /usr/bin/composer
ENV PORT=8000
ENTRYPOINT ["sh", "docker/entrypoint.sh" ]

FROM node:14-alpine as node

WORKDIR /var/www
COPY . .

RUN npm install --global cross-env
RUN npm install



VOLUME /var/www/node_modules