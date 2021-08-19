FROM php:7.4.22-apache-bullseye
    
EXPOSE 80

WORKDIR /var/www/html/

COPY . .
