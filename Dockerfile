# 1. Gunakan PHP 8.1 (aman untuk Laravel 9/10)
FROM php:8.2-cli

# 2. Install dependency sistem
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl

# 3. Install PHP extension yang dibutuhkan Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# 4. Set working directory
WORKDIR /app

# 5. Copy semua file project
COPY . .

# 6. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 7. Install dependency Laravel
RUN composer install --optimize-autoloader --no-interaction

# 8. Jalankan Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
