# Intern Manager

## ! under_deployment


setup .env from .env.example
Open the console and cd your project root directory
Run composer install or php composer.phar install
Run php artisan key:generate
Run php artisan migrate
Run php artisan db:seed to run seeders, if any.
Run php artisan serve

npm i 
npm run dev

Nepali Calendar setup:
     Run php artisan vendor:publish --tag=nepali-calendar-config
     in config/nepali-calendar.php set the return-type to array i.e, 'return_type' => 'array',

