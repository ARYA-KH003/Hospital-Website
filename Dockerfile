FROM php:apache

# Install mysqli extension
RUN docker-php-ext-install mysqli