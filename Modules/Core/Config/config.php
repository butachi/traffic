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
    | Location where your themes are located
    |--------------------------------------------------------------------------
    */
    'themes_path' => base_path() . '/Themes',

    /*
    |--------------------------------------------------------------------------
    | Which administration theme to use for the back end interface
    |--------------------------------------------------------------------------
    */
    'admin-theme' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | AdminLTE skin
    |--------------------------------------------------------------------------
    | You can customize the AdminLTE colors with this setting. The following
    | colors are available for you to use: skin-blue, skin-green,
    | skin-black, skin-purple, skin-red and skin-yellow.
    */
    'skin' => 'skin-blue',

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
            //'auth.admin',
            //'permissions',
        ],
        'frontend' => [
            'web'
        ],
        'api' => [
        ],
    ],
];
