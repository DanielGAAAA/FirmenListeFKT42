#!/bin/sh

#if [ ! -f "/var/www/verndor/autoload.php"]; then
 #   composer install --no-progress --no-interaction
#fi
 
if [ ! -f ".env"]; then
    echo "creating env file for env $APP_ENV"
    cp .env.example .env
else
    echo "env exist."
fi
composer install --no-progress --no-interaction
php artisan migrate
php artisan db:seed
php artisan key:generate
php artisan cache:clear
php artisan config:clear
php artisan route:clear
npm run dev

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"