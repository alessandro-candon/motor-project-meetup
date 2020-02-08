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
