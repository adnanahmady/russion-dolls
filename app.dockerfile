FROM php:7.2-fpm

RUN apt-get update && apt-get install -y \
        zip \
        unzip \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/lib/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql
RUN docker-php-ext-install zip
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql

RUN apt-get update && apt-get install -y wget
RUN curl -sS https://getcomposer.org/installer \
        | php -- --install-dir=/usr/local/bin --filename=composer
RUN echo 'export PATH=$HOME/.composer/vendor/bin:$PATH' >> $HOME/.bashrc
RUN su && composer global require laravel/installer
RUN apt-get update && apt-get install -y sqlite

RUN echo 'alias ch="chmod -R 777 ."' >> $HOME/.bashrc
RUN echo 'alias art="php artisan"' >> $HOME/.bashrc
RUN echo 'alias phpunit=vendor/phpunit/phpunit/phpunit' >> $HOME/.bashrc

RUN echo "max_file_uploads=100" >> /usr/local/etc/php/conf.d/docker-php-ext-max_file_uploads.ini
RUN echo "post_max_size=120M" >> /usr/local/etc/php/conf.d/docker-php-ext-post_max_size.ini
RUN echo "upload_max_filesize=120M" >> /usr/local/etc/php/conf.d/docker-php-ext-upload_max_filesize.ini

RUN pecl install redis && docker-php-ext-enable redis