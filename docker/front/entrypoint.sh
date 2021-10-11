#!/bin/sh

export host='$host'
export request_uri='$request_uri'

# ENV
envsubst < /etc/nginx/default.conf.template > /etc/nginx/default.conf
envsubst < /etc/nginx/default_ssl.conf.template > /etc/nginx/default_ssl.conf

# Launch nginx
while :;
do
    # ssl or not
    if [ ! -e "/etc/letsencrypt/live/${HOST_PREFIX}.autobuyweb.fr/cert.pem" ]; then
        echo "NO SSL"
        cp -f /etc/nginx/default.conf /etc/nginx/conf.d/default.conf
    else
        echo "SSL!"
        cp -f /etc/nginx/default_ssl.conf /etc/nginx/conf.d/default.conf
    fi
    sleep 1h & wait ${!}; nginx -s reload;
done & nginx -g "daemon off;"
