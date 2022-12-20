#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-interaction
fi

if [ ! -f ".env" ]; then   
    cp .env.example .env
fi

php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan storage:link
php artisan migrate:fresh --seed

chmod 777 -R /var/www/html/storage/

