FROM php:8.2-fpm
RUN docker-php-ext-install opcache
# Set upload size
RUN echo "upload_max_filesize=1024M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size=1024M" >> /usr/local/etc/php/conf.d/uploads.ini