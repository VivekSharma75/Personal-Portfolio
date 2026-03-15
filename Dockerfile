FROM php:8.2-apache

# Install PHP extensions and switch Apache to mpm_prefork (required for mod_php)
# while enabling mod_rewrite.
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2dismod mpm_event \
    && a2enmod mpm_prefork \
    && a2enmod rewrite

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

# Apache always listens on 80. We set PORT=80 in Railway Variables so
# Railway healthchecks the correct port. No runtime sed manipulation needed.
CMD ["apache2-foreground"]
