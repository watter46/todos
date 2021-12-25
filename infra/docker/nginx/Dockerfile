FROM nginx:1.20-alpine

# non-root-user create
ARG GROUP_NAME=hoge
ARG GROUP_ID ${GROUP_ID}
ARG USER_NAME=hoge
ARG USER_ID ${USER_ID}

RUN addgroup -S -g $GROUP_ID $GROUP_NAME && \
    adduser -u $USER_ID -D $USER_NAME -G $USER_NAME && \
    adduser $USER_NAME $GROUP_NAME && \
    chown -R $USER_NAME:$GROUP_NAME /var/cache/nginx && \
    chmod -R g+w /var/cache/nginx && \
    chown -R nginx:nginx /etc/nginx/conf.d

# nginx setup files
COPY ./infra/docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./infra/docker/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf

USER $USER_NAME

WORKDIR /var/www/backend
