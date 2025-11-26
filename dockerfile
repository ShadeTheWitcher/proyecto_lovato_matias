FROM php:8.2-apache

# Instalamos dependencias necesarias para intl y otras extensiones
RUN apt-get update && apt-get install -y \
    libicu-dev \
    g++ \
    make \
    autoconf \
    pkg-config \
    zip \
    unzip \
    && docker-php-ext-install mysqli pdo pdo_mysql intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copiamos todo el proyecto
COPY . /var/www/html/

# Cambiamos permisos para Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Habilitamos mod_rewrite para URLs amigables
RUN a2enmod rewrite

EXPOSE 80
