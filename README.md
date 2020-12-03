## About

Billing Laravel is API based project for biilings.

## Installation
1. git pull https://github.com/sanatanweb/billing-laravel.git
2. cd billing-laravel
3. composer install
4. cp .env.example .env
5. Set your database, username and password.
6. php artisan key:generate

## Status Codes
1. 200 OK
2. 201 Created
3. 401 Unauthenticated
4. 403 Unauthorized/Forbidden
5. 408 Request time out
6. 422 Unprocessable Entity/Validation errors
7. 500 Internal Server Error