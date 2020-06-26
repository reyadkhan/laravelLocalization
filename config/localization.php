<?php

return [

    /**-----------------------------------------------------------------------------------------------------------
     *
     * Localization configuration file. You can change the variables as your need.
     * `query_var` will define the query variable of the url, like http://localhost:8000?lang=en
     *
     * ------------------------------------------------------------------------------------------------------------
     */

    'available_locales' => [
        'en', 'fr', 'ln'
    ],

    'fallback_locale' => 'en', // Optional, if not set then it will take app fallback locale from config/app.php

    'query_var' => 'lang'
];