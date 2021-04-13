# aijegaganeauloto.fr

Repository de démo pour la présentation "CI/CD (presque) sans les mains avec Github Actions"

## Requirements

- PHP 7.4
- Docker + Docker Compose
- Symfony CLI
- Composer

## Install

### 1. Clone the repository

```
$ git clone git@github.com:NiceOpenSource/aijegaganeauloto.fr.git
```

### 2. Install dependencies

```
$ composer install
```

### 3. Docker composer

```
$ docker-compose up -d
```

#### 4. Create database schema

```
$ symfony console doctrine:migrations:migrate
```

### 5. Launch web server

```
$ symfony serve -d
```

Browser url provided.
