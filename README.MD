# Symfony 5 project - intro meetup -

## Controller
Install maker bundle, it isn't part of skeleton project :

```bash
composer require symfony/maker-bundle --dev
```

Use it to create a controller, it is so easy (and interactive) :

```bash
php bin/console make:controller  
```


We will use @annotation for make a controller securized but
you can make the same with a .yaml file (recommended) :

```bash
composer require annotations
```


## ORM and DB
First of all we need to configure the db URL, for example :

```dotenv
DATABASE_URL=mysql://root:mysqlroot@127.0.0.1:3306/motor_meetup_project?serverVersion=5.7
```
* Database Engine : mysql
* User : root
* Psw : mysqlroot
* Host : 127.0.0.1
* Port : 3306
* DBName : motor_meetup_project
* serverVersion : 5.7

First step, we need to create the DB :

```bash
php bin/console doctrine:database:create
```

And update the db with the new objects :

```bash
php bin/console doctrine:schema:update --force
```

## FORM

```bash
 php bin/console make:form  
```

Trick to make the form compatible with Bootstrap 4 :

*config/packages/twig.yaml*
```yaml
twig:
    form_themes: ['bootstrap_4_layout.html.twig']
```

# API PLATFORM 
It is a very good tool to automatically create a CRUD APIs
Is quite simple, the first step is to install the bundle.

```bash
 composer require api
```

We test the POST with this curl :

```bash

curl -X POST "http://127.0.0.1:8000/api/cars" -H "accept: application/ld+json" -H "Content-Type: application/ld+json" -d "{\"name\":\"X3\",\"brand\":\"BMW\",\"createdAt\":\"2020-02-08T09:03:23.852Z\"}"

```
