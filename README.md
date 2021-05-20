# RabbitMQ Test

## Setup local
1. Clone source code
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. Edit `.env`, update below info:
- AMQP_HOST
- AMQP_PORT
- AMQP_USER
- AMQP_PASSWORD

## Publish a message
- `php artisan message:publish`

## Subscribe 
- `php artisan message:process`