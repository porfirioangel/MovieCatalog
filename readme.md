# Movie Catalog

This repository is an example of web application to manage a movie catalog, 
here we can see the use of the following concepts:
- Frontend development with Html, Bootstrap and Javascript
- Rest api development with Laravel
- Rest api consumption with Ajax
- Unit testing
- Functional testing
- Travis integration

## Travis status
[![Build Status](https://travis-ci.org/porfirioangel/MovieCatalog.svg?branch=master)](https://travis-ci.org/porfirioangel/MovieCatalog)

## Challenge requirements

### Write an application to manage a movie catalog.

#### Specs
 
- User must be able to create an account, and log in
- When logged in, user should be able to see a list of his/her movies, as well as add, edit, and delete movies.
- Each entry has a title, genre, and year
- Filter by year(from-to) and/or by genre
- User setting – User must be able to edit his/her account
- Minimal UI/UX design is needed.
- The app should use AJAX at some point.
 
#### Bonus points

- Use unit testing.
- All actions are done client side using AJAX, avoiding to refresh the page.
- REST API. Make it possible to perform all user actions via an API, including authentication.
- Explain how a REST API works and demonstrate that by creating functional tests that use the REST Layer directly.

## Instructions to install and run project
**Clone the project:**
```
git clone https://github.com/porfirioangel/MovieCatalog.git
```

**Install laravel dependencies:**
```
cd MovieCatalog
composer install
```

**Get .env configuration file:**
```
cp .env.example .env
```

**Set database information in .env file:**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mydatabase
DB_USERNAME=myuser
DB_PASSWORD=mypassword
```

**Generate application key:**
```
php artisan key:generate
```

**Run migrations and seed database:**
```
php artisan migrate:fresh --seed
```

**Run project:**
```
php artisan serve --host 0.0.0.0 --port 8000
```

## Instructions to test project

### Unit testing
**Execute the Laravel unit tests:**
```
vendor/bin/phpunit
```

### Functional testing
The functional test of this application is developed with bdd and selenium 
using python, so we also need to install some python dependencies in order to 
execute functional tests. 

**Create python virtual env:**
```
cd tests/Functional
virtualenv --python=/usr/bin/python3 venv
```

**Activate virtualenv:**
```
source venv/bin/activate
```

**Install python dependencies:**
```
pip install -r requirements.txt
```

**Execute functional tests:**
```
behave
```

### About Travis integration:
All the unit and functional tests mentioned above are executed automatically 
when a commit is pushed to the github repository, so in this way we can 
ensure the quality of the project and that the new code does not break the 
previous one.