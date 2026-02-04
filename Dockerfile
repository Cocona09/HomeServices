# Step 1: Base image with PHP + Apache
FROM php:8.2-apache

# Step 2: Set working directory
WORKDIR /var/www/html

# Step 3: Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl && \
    docker-php-ext-install zip && \
    a2enmod rewrite

# Step 4: Set Apache to serve Laravel's public folder
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Step 5: Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Step 6: Copy project files
COPY . .

# Step 7: Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Step 8: Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Step 9: Expose port 80
EXPOSE 80

# Step 10: Start Apache
CMD ["apache2-foreground"]
