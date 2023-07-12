FROM php:7.4-apache

# Instalar la extensión mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copiar el código de la aplicación al directorio del servidor web
COPY . /var/www/html/

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

EXPOSE 80