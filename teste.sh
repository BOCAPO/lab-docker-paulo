#!/bin/bash
docker-compose up -d --build
docker-compose run --rm composer install
docker-compose run --rm npm install
docker-compose run --rm npm run dev
docker-compose run --rm artisan key:generate
docker-compose run --rm artisan migrate
docker exec -it movimentacaograos_app bash
chmod 777 storage/logs
chmod -R gu+w storage
chmod -R guo+w storage
php artisan cache:clear
