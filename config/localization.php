<?php

return [

    /**-----------------------------------------------------------------------------------------------------------
     *
     * Localization configuration file. You can change the values as your need.
     * available_locales should be valid ISO 693-1 code.
     * `query_var` will define the query variable of the url, like http://localhost:8000?lang=en
     * It will put the locale in session from the query variable.
     *
     * ------------------------------------------------------------------------------------------------------------
     */

    'available_locales' => [
        'en', 'fr'
    ],

    'fallback_locale' => 'en', // Optional, if not set then it will take app fallback locale from config/app.php

    'query_var' => 'lang',

    'session_key' => 'webAppLocale'
];