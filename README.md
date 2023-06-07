## Requirement
- PHP 8.0
- Laravel 9
- make sure you have discord account
- create discord server
- create webhook from your discord server :
    + under the Text Channels, choose one of them and then click the gear icon
    + click integrations
    + create webhook
    + fill the name of webhook anything you want
    + click copy webhook url



## How to run the project

- make sure the requirements are fulfilled
- copy your .env.example and rename as .env
- paste your webhook url into .env on line DISCORD_WEBHOOK_URL
- run this comand one by one:
- composer install
- npm install
- php artisan migrate
- php artisan db:seed
- php artisan serve

open second terminal :
- npm run dev

## Fyi : this project is using vite (modern JS asset bundling)
visit the doc here : https://laravel.com/docs/9.x/vite
no need to worry , everything is setup correctly according the doc. 
