# Usamos PHP 8.2 con Apache
FROM php:8.2-apache

# Instalamos extensiones necesarias para CodeIgniter
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiamos todo el proyecto al contenedor
COPY . /var/www/html/

# Cambiamos permisos para Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Habilitamos mod_rewrite para URLs amigables
RUN a2enmod rewrite

# Exponemos el puerto 80
EXPOSE 80
