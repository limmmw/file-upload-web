FROM php:8.2-fpm

# Install ekstensi
RUN apt-get update && \
    apt-get install -y php8.2-zip unzip && \
    docker-php-ext-install opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set upload size
RUN echo "upload_max_filesize=1024M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini

WORKDIR /var/www/html

COPY composer.json /var/www/html/composer.json
