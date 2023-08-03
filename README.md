# System MediCityCare

System medical city care.

# Version System

**PHP:** 8.2.8 <br/>
**Laravel:** 10.16.1 <br/>
**Banco de Dados:** MySQL 8.0.33 <br/>

# Info

Branch: <br/>
* master  (not Laravel-Sail)<br/>
* sail    (with Laravel-Sail)

# Instructions

Git Init repository

```bash

# clone the repo
$ git clone https://github.com/Gabe-Siqueira/laravel-sail-medicitycare.git

# go into app's directory
$ cd laravel-sal-medicitycare

```

Change connection information:

```bash

# file
.env

```

You can install the package via composer:

```bash

# install app's dependencies
$ composer install

```

Start application database structure:

```bash

# create database tables
$ php artisan migrate

#insert basic data for the application
$ php artisan db:seed

```

Generate keys needed for the application:

```bash

# generate application key
$ php artisan key:generate

# generate jwt key
$ php artisan jwt:secret

```

start application services:

```bash

# start serve
$ php artisan serve --port=8000

```

Open the browser and enter the path in the 'php-registration-system' folder:

```bash

# browser
$ http://localhost:8000/

```

# Login

```bash
Email:
root@example.com

```

```bash
Password:
P@ssw0rd

```

# Postman

[LARAVEL-SAIL-MEDICITYCARE.postman_collection.json](LARAVEL-SAIL-MEDICITYCARE.postman_collection.json)
<br/><br/>
Import file in Postman to access system requests.

# Contact
- **Author**: Gabriel Siqueira
- **E-mail**: gabriel.snsilva2@gmail.com
- **Linkedin**: https://www.linkedin.com/in/gabriel-siqueira-904b67180
