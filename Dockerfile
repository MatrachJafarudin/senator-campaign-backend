FROM php:8.2-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# install php ext
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# get latest composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# RUN chown -R www-data:www-data storage bootstrap/cache

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

USER $user

WORKDIR /var/www/html

CMD [ "php", "artisan", "serve", "--host=0.0.0.0" ]