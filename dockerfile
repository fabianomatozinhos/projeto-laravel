FROM php:7.4-cli
WORKDIR /the/workdir/path
COPY . .
RUN composer update
