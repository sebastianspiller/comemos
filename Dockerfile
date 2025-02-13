FROM php:8.2-apache

# Apache Module aktivieren
RUN a2enmod rewrite

# PHP Extensions installieren
RUN docker-php-ext-install pdo pdo_mysql