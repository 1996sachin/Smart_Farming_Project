FROM php:8.2-apache

WORKDIR /var/www/html

# Install system dependencies and PHP build dependencies
RUN apt-get update \
    && apt-get install -y \
        build-essential \
        pkg-config \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libwebp-dev \
        libzip-dev \
        libonig-dev \
        zip \
        unzip \
        git \
        curl \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install -j$(nproc) gd mysqli pdo_mysql mbstring zip \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copy project files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 9003

CMD ["apache2-foreground"]