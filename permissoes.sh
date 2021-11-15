#!/bin/sh
docker-compose run --rm composer install
docker-compose run --rm npm install
docker-compose run --rm npm run dev
cp .env.example .env
docker-compose run --rm artisan key:generate
docker-compose run --rm artisan migrate
docker-compose run --rm artisan vendor:publish

docker exec -it movimentacaograos_app bash
chmod 777 storage/logs
chmod -R gu+w storage
chmod -R guo+w storage
php artisan cache:clear
