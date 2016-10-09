<?php

return [
    /*
   |--------------------------------------------------------------------------
   | The prefix that will be used for the administration
   |--------------------------------------------------------------------------
   */
    'admin-prefix' => 'backend',

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    | You can customise the Middleware that should be loaded.
    | The localizationRedirect middleware is automatically loaded for both
    | Backend and Frontend routes.
    */
    'middleware' => [
        'backend' => [
            'auth.admin',
            'permissions',
        ],
        'frontend' => [
            'web'
        ],
        'api' => [
        ],
    ],
];
