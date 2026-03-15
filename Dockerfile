FROM php:8.2-apache

# Install PHP extensions and enable mod_rewrite
RUN docker-php-ext-install mysqli pdo pdo_mysql && a2enmod rewrite

# Allow .htaccess overrides
RUN printf '<Directory /var/www/html>\n    AllowOverride All\n    Options -Indexes +FollowSymLinks\n    Require all granted\n</Directory>\n' \
    >> /etc/apache2/apache2.conf

# Copy project files
COPY . /var/www/html/

# Remove sensitive / unnecessary files
RUN rm -f /var/www/html/setup.sql \
          /var/www/html/.gitignore \
          /var/www/html/.dockerignore \
          /var/www/html/docker-entrypoint.sh

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type f -exec chmod 644 {} \; \
    && find /var/www/html -type d -exec chmod 755 {} \;

# Generate startup script directly in the container (guaranteed LF line endings)
# Makes Apache listen on Railway's dynamic $PORT (falls back to 80 locally)
RUN printf '#!/bin/sh\n\
APP_PORT="${PORT:-80}"\n\
sed -i "s/Listen 80/Listen $APP_PORT/g" /etc/apache2/ports.conf\n\
sed -i "s/<VirtualHost \\*:80>/<VirtualHost *:$APP_PORT>/g" /etc/apache2/sites-available/000-default.conf\n\
exec apache2-foreground\n' \
    > /usr/local/bin/start.sh \
    && chmod +x /usr/local/bin/start.sh

EXPOSE 80

CMD ["/usr/local/bin/start.sh"]
