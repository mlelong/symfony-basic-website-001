FROM nginx

# Copy host
COPY ./docker/front/server.conf /etc/nginx/server.conf

COPY ./docker/front/default.conf /etc/nginx/default.conf.template
COPY ./docker/front/default_ssl.conf /etc/nginx/default_ssl.conf.template

# Copy source
COPY ./app/public /www/app/public

# entrypoint
COPY ./docker/front/entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]