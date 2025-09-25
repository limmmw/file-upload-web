FROM php:8.2-fpm

# Install ekstensi
RUN docker-php-ext-install opcache

# Tambahkan Composer (copy dari official image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set upload size
RUN echo "upload_max_filesize=1024M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini

WORKDIR /var/www/html
