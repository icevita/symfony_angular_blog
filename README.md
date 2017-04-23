Angular with Symfony Blog via Rest



Installation

backend folder:

```
composer install
//php app/console doctrine:schema:update --force --env=prod
php app/console server:start
```
that will run backend server on http://127.0.0.1:8000 


frontend folder: 
```
npm install
bower install
gulp
gulp serve
```
that will run frontend on http://127.0.0.1:3000 
