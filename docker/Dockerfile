# Base image with PHP 8.2 and Apache
FROM php:8.2-apache

# Install required extensions
RUN apt-get update && apt-get install -y \
    curl\
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    zip\
    git \
    && docker-php-ext-install pdo_mysql zip \
    && pecl install xdebug && docker-php-ext-enable xdebug

# Enable mod_rewrite for Laravel
RUN a2enmod rewrite

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

# Install npm dependencies
RUN npm install


# Salin semua file proyek ke dalam container
COPY . .

# Set permissions
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache


# Ekspos port 8080
EXPOSE 8080


# Start supervisord
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

