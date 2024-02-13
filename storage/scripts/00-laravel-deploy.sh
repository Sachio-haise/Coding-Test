#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

# copy env file
 cp .env.example .env

# echo "generating application key..."
php artisan key:generate --show

#node install
npm install

#node build
npm run build

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Storage Link..."
php artisan storage:link --force
