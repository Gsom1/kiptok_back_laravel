FROM php:8.0-fpm

WORKDIR /app

RUN apt-get update

RUN apt-get install -y \
    build-essential \
    libfreetype6-dev \
    locales \
    zip \
    vim \
    unzip \
    git \
    curl \
	mc \
	net-tools \
	iputils-ping \
	curl \
	libcurl3-dev

RUN apt-get -y update \
	&& apt-get install -y libicu-dev \
	&& docker-php-ext-configure intl \
	&& docker-php-ext-install intl

RUN docker-php-ext-install sockets \
	curl \
	bcmath \
	opcache \
	pcntl

COPY opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

#ARG DEBUG_PORT
#RUN pecl install xdebug \
#&& echo "zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20200930/xdebug.so" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#&& echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#&& echo "xdebug.output_dir=/tmp/profiler" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#&& echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#&& echo "xdebug.client_port=${DEBUG_PORT}" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
#&& echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN pecl install -o -f redis apcu \
    && docker-php-ext-enable redis apcu

# Install SSH server, set root password and allow root login
RUN apt-get  --yes install openssh-server
RUN mkdir /var/run/sshd
RUN echo 'root:123' | chpasswd
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

#RUN chown -R www-data:www-data /app/*
#RUN chmod -R 777 /app/storage/logs/*

#COPY ./src /app

EXPOSE 9000 22
COPY entry.sh /tmp/entry.sh
RUN chmod +x /tmp/entry.sh
CMD ["/tmp/entry.sh"]
