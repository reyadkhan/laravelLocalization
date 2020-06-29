### Simple localization package for Laravel

It will switch locale according to **url** parameter or user's language

#### Requirements:
* PHP >= 7.2.5
* Laravel >= 6.0
#### Installation:
* Run composer command:
```
composer require webapp/localization
```
* To publish `localization.php` config file run the command:
```
php artisan vendor:publish --tag=config
```
Change the `available_locales` from config file according to your application locales.
* Put `@include('localization::combo')` in your layout view, where user can change the locale.
>That's all for primary setup. Enjoy...
#### Advance uses:
* To publish the localization combo box in your views directory, run the command:
```
php artisan vendor:publish --tag=view
```
It will create a view file under `resources/views/vendor/localization` directory. There is a form inside the `combo.blade.php` view file. You can change the form if needed. <br>

You can edit the `config/localization.php` file as your need. The `query_var` is the url parameter variable. If you want to set locale in english then you can pass lang=en as the parameter with url.

`Ex: http://localhost:8000?lang=en`<br>
You can change the `query_var`. By default it is `lang`.<br>
>It stores user's **locale** in session. So from next request it will take user locale from session. **Session key**(session_key) is also configured under config file. You can change the key if needed.
