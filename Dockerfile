FROM php:8.1-apache-bullseye

# Install Python 3 and minimal PHP build deps
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        python3 \
        python3-pip \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libonig-dev \
        libxml2-dev \
    && rm -rf /var/lib/apt/lists/*

# PHP extensions needed by the app (including mysqli)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" gd pdo_mysql mysqli mbstring

# Enable URL rewriting
RUN a2enmod rewrite

# Python ML dependencies
COPY farmer/requirements.txt /tmp/requirements.txt
RUN pip3 install --no-cache-dir -r /tmp/requirements.txt

# Copy application code
WORKDIR /var/www/html
COPY . /var/www/html/

EXPOSE 9003

CMD ["apache2-foreground"]

