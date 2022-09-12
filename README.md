# devpay

### Steps to install:

```sh
$ cp .env.example .env
$ docker-compose up -d --build
$ docker-compose exec app composer install
$ docker-compose exec app php artisan migrate --seed
```

### Steps to run:
```sh
$ docker-compose up -d
```

### Steps to run tests:

```sh
$ docker-compose exec app vendor/bin/phpunit
```