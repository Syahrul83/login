# Menggunakan base image PHP 8.3.11-FPM
FROM php:8.3.11-fpm

# Update package list dan install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libxpm-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    bash \
    fcgiwrap \
    libmcrypt-dev \
    libonig-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath opcache

# Install Composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www/html/

# Set ownership and permissions untuk direktori aplikasi
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Pindah ke direktori aplikasi
WORKDIR /var/www/html/

# Hapus file .env jika ada
RUN [ -f .env ] && rm .env || true

# Salin file .env.production menjadi .env
RUN cp .env.production .env


# Cache konfigurasi Laravel
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Jalankan container sebagai user www-data
USER www-data

# Ekspos port 9000
EXPOSE 9000

# Command default untuk menjalankan PHP-FPM
CMD ["php-fpm"]
