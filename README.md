### Simple localization package for laravel

It will switch locale according to **url** query or user's language

#### Requirements:
* PHP >= 7.2.5
* Laravel >= 6.0
#### Installation:
* Run composer command:
```
composer require webapp/localization
```
* To publish localization.php config file run the command:
```
php artisan vendor:publish --tag=config
```
you can edit the config/localization.php file as your need. The `query_var` is the query variable. If you want to set locale english then you can pass lang=en as query string.

`Ex: http://localhost:8000?lang=en`<br>
You can change the query_var. By default it is `lang`.<br>
