FROM node:14-alpine as node

FROM php:7.4-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1 \
		COMPOSER_HOME=/composer

# install composer 
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

# install middleware 
RUN apk add --update --no-cache oniguruma-dev git unzip libgcc && \
		apk add --no-cache make gcc g++ python2 && \
		docker-php-ext-install pdo_mysql mysqli mbstring

# create non-root-user 
ARG GROUP_NAME=hoge \
		GROUP_ID ${GROUP_ID} \
		USER_NAME=hoge \
		USER_ID ${USER_ID}

RUN addgroup -S -g $GROUP_ID $GROUP_NAME && \
		adduser -u $USER_ID -D $USER_NAME -G $USER_NAME && \
		adduser $USER_NAME $GROUP_NAME && \
		chown -R $USER_NAME:$GROUP_NAME /var/www/ && \
		chmod +x /var/www/ && \
		mkdir /var/run/php-fpm && \
		chown -R $USER_NAME:$GROUP_NAME /var/www/ && \
		chown -R $USER_NAME:$GROUP_NAME /var/run/ && \
		chown -R $USER_NAME:$GROUP_NAME /var/log

# install node.js 
COPY --from=node /usr/local/bin/node /usr/local/bin/
COPY --from=node /usr/local/lib/node_modules/ /usr/local/lib/node_modules/

RUN ln -s /usr/local/bin/node /usr/local/bin/nodejs \
    && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

# copy php setup files
COPY ./infra/docker/php/php-fpm.d/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY ./infra/docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY ./infra/docker/php/php.ini /usr/local/etc/php/php.ini

USER $USER_NAME

WORKDIR /var/www/backend
