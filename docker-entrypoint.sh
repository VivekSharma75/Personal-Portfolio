#!/bin/bash
set -e

# Railway injects a PORT env var. Make Apache listen on it (fallback to 80).
APP_PORT="${PORT:-80}"

sed -i "s/Listen 80/Listen ${APP_PORT}/g" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${APP_PORT}>/g" \
    /etc/apache2/sites-available/000-default.conf

exec "$@"
