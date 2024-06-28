FROM php:8.0.9-apache as builder

RUN docker-php-ext-install mysqli

COPY ./sitio /var/www/html/

CMD ["apache2-foreground"]