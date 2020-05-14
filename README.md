# brokerdashboard


1.настраиваем базу в .env
2.composer install
3.php artisan key:generate
4.default Lng /app/Http/Middleware/SetLang.php


Run Migrations

php artisan migrate
php artisan migrate --path="database/migrations/Bank" 
php artisan migrate --path="database/migrations/Crypto"
 
-----BL------ 
php artisan migrate
php artisan migrate --path="database/migrations/BL"
php artisan migrate --path="database/migrations/FeBeObjects"
php artisan migrate --path="database/migrations/FeBeRoutes" 
php artisan migrate --path="database/migrations/FeItems" 
php artisan migrate --path="database/migrations/Menu" 
php artisan migrate --path="database/migrations/Questionnaires" 
php artisan migrate --path="database/migrations/ONE" 
php artisan migrate --path="database/migrations/Help"
php artisan migrate --path="database/migrations/Faq"
php artisan migrate --path="database/migrations/Bank"
php artisan migrate --path="database/migrations/QuestionnaireTemplates"
php artisan migrate --path="database/migrations/BankNet"

---------------УДАЛЕНИЕ И СОЗДАНИЕ ТАБЛИЦ-----------------------
php artisan migrate:refresh
php artisan migrate:refresh --path="database/migrations/BL"
php artisan migrate:refresh --path="database/migrations/FeBeObjects"
php artisan migrate:refresh --path="database/migrations/FeBeRoutes"
php artisan migrate:refresh --path="database/migrations/FeItems" 
php artisan migrate:refresh --path="database/migrations/Menu" 
php artisan migrate:refresh --path="database/migrations/Questionnaires" 
php artisan migrate:refresh --path="database/migrations/ONE" 
php artisan migrate:refresh --path="database/migrations/Help"
php artisan migrate:refresh --path="database/migrations/Faq"
php artisan migrate:refresh --path="database/migrations/Bank"
php artisan migrate:refresh --path="database/migrations/QuestionnaireTemplates"
php artisan migrate:refresh --path="database/migrations/BankNet"



Run Seeder 1 file, name DatabaseSeeder
1.)clear cache

php artisan clear-compiled 
composer dump-autoload
php artisan optimize

2.)
php artisan db:seed --class=DatabaseSeeder 
php artisan db:seed --class=DataBaseClientSeeder
php artisan db:seed --class=DatabaseUpdateSeeder

php artisan db:seed --class=DatabaseBankNetSeeder


3)jwt change timeOut login file .env SESSION_LIFETIME=1 and file config/session.php-lifetime


php artisan db:seed --class=TestSeeder
php artisan db:seed --class=ActionLogsTotalSeeder

 
 baseURL Front /dashboard_front/src/main.js
  
 // baseURL: 'http://127.0.0.1/api',
 baseURL: 'http://rbl-api.loc/api',




