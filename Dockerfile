# Use an official PHP runtime as a parent image
FROM php:apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Copy the current directory contents into the container
COPY . /var/www/html/

# Set the working directory to /var/www/html
WORKDIR /var/www/html/
