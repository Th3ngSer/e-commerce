FROM php:8.2-fpm

# Install system dependencies
RUN apt update && apt install -y unzip curl git nodejs npm libzip-dev libxml2-dev

# Install PHP extensions
# RUN docker-php-ext-install pdo pdo_mysql zip dom xml
RUN docker-php-ext-install xml dom pdo pdo_mysql zip


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Allow nginx (separate container) to reach PHP-FPM over the Docker network
RUN sed -i 's/^listen\s*=\s*.*/listen = 9000/' /usr/local/etc/php-fpm.d/www.conf

# Set working directory
WORKDIR /var/www

