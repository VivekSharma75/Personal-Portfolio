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

EXPOSE 80

# Use exec-form with sh -c so $PORT is expanded at container RUNTIME (not build time).
# Sed updates ports.conf and the VirtualHost so Apache listens on Railway's assigned port.
CMD ["sh", "-c", "sed -i \"s/Listen 80/Listen $PORT/\" /etc/apache2/ports.conf && sed -i \"s/:80>/:$PORT>/\" /etc/apache2/sites-available/000-default.conf && exec apache2-foreground"]
