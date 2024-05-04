FROM dunglas/frankenphp as unibase-frankenphp

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install VIM and Git
RUN apt-get update && apt-get install -y vim git

# Install the PostgreSQL PHP extensions and other dependencies
RUN install-php-extensions \
    sqlite3 \
    pdo_sqlite \
    pcntl \
    intl \
    opcache

# Be sure to replace "your-domain-name.example.com" by your domain name
ENV SERVER_NAME=unibase.coriolanus.synology.me
# If you want to disable HTTPS, use this value instead:
#ENV SERVER_NAME=:80

# Enable PHP production settings
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Copy the PHP files of your project in the public directory
# COPY . /app/public
# If you use Symfony or Laravel, you need to copy the whole project instead:
COPY . /app

# Change owner of storage and bootstrap/cache directories
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache
RUN chmod -R 775 /app/storage /app/bootstrap/cache

# Run Composer
RUN composer install --no-dev --no-interaction --no-progress --optimize-autoloader

# Run artisan commands
RUN php artisan key:generate && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan config:cache && \
    php artisan optimize
