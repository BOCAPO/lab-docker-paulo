
# PROJETO MADEFY

## INSTALACAO USANDO DOCKER

Primeiro entre no diretorio root e execute os comandos
- `cp docker-compose.yml.example docker-compose.yml`
- `docker-compose up -d --build` . A aplicação deve esta roteada em [http://localhost:80](http://localhost:80).

Em seguida execute os seguintes comandos:

- `docker-compose run --rm composer install`
- `docker-compose run --rm npm install`
- `docker-compose run --rm npm run dev`
- `cp .env.example .env`
- `docker-compose run --rm artisan key:generate`
- `docker-compose run --rm artisan migrate`
- `docker-compose run --rm artisan vendor:publish`
---
Containeres criados e suas respectivas portas:w

- **app** - `:80`
- **postgres** - `:5432`
- **php** - `:9000`
- **npm**
- **composer**
- **artisan**
---
### DEFINIR PERMISSOES

- `docker exec -it movimentacaograos_app bash`
- `chmod 777 storage/logs`
- `chmod -R gu+w storage`
- `chmod -R guo+w storage`
- `php artisan cache:clear`
---

### ACESSO A APLICAÇÃO
>http://localhost

### CRIACAO DE USUARIO PADRAO
>Usuario: admin
>Senha: 123456
---

### Autores

- `Bruno Araujo`
