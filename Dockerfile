# Use the official PHP image with Apache
FROM php:8.2-apache

# Copy your PHP files into the Apache document root
COPY public/ /var/www/html/

# Enable Apache mod_rewrite if needed (optional)
RUN a2enmod rewrite