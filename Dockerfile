FROM php:8.3-fpm-bookworm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libzip-dev \
    zlib1g-dev \
    libonig-dev \
    libxml2-dev \
    procps \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-jpeg --with-webp
RUN docker-php-ext-install \
    gd \
    zip \
    pdo \
    pdo_mysql \
    mbstring \
    xml

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html