FROM php:8.2-apache

# Instalar dependencias
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

# Copiamos configuración para permitir .htaccess
COPY docker/apache.conf /etc/apache2/conf-enabled/apache.conf

# Copiamos el proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/writable \
    && chmod -R 777 /var/www/html/assets/uploads

# Activar mod_rewrite
RUN a2enmod rewrite

EXPOSE 80
