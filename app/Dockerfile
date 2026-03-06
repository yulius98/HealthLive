# Gunakan image PHP dengan ekstensi yang dibutuhkan
FROM php:8.2-fpm

# Install ekstensi yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy semua file ke container
COPY . .

# Install dependencies Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Set permission storage & bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Expose port 9000 (default php-fpm)
EXPOSE 9000

CMD ["php-fpm"]
