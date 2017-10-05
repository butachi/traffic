<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Session Key
    |--------------------------------------------------------------------------
    |
    | Please provide your session key for Sentinel.
    |
    */

    'session' => 'butachi_bebuti',

    /*
    |--------------------------------------------------------------------------
    | Cookie Key
    |--------------------------------------------------------------------------
    |
    | Please provide your cookie key for Sentinel.
    |
    */

    'cookie' => 'butachi_bebuti',

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    |
    | Please provide the user model used in Sentinel.
    |
    */

    'users' => [

        'model' => 'Modules\System\Entities\Users\EloquentUser',

    ],


    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    |
    | Please provide the role model used in Sentinel.
    |
    */

    'roles' => [

        'model' => 'Modules\System\Entities\Roles\EloquentRole',

    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    |
    | Here you may specify the permissions class. Sentinel ships with two
    | permission types.
    |
    | 'Cartalyst\Sentinel\Permissions\StandardPermissions'
    | 'Cartalyst\Sentinel\Permissions\StrictPermissions'
    |
    | "StandardPermissions" will assign a higher priority to the user
    | permissions over role permissions, once a user is allowed or denied
    | a specific permission, it will be used regardless of the
    | permissions set on the role.
    |
    | "StrictPermissions" will deny any permission as soon as it finds it
    | rejected on either the user or any of the assigned roles.
    |
    */

    'permissions' => [
        'class' => 'Modules\Core\Auth\Permissions\StandardPermissions',
    ],

    /*
    |--------------------------------------------------------------------------
    | Persistences
    |--------------------------------------------------------------------------
    |
    | Here you may specify the persistences model used and weather to use the
    | single persistence mode.
    |
    */

    'persistences' => [

        'model' => 'Modules\Core\Auth\Persistences\EloquentPersistence',

        'single' => false,

    ],

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
    'admin-theme' => 'OpenCart',
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
            'web',
            'auth.admin',
            //'permissions',
        ],
        'frontend' => [
            'web'
        ],
        'api' => [
        ],
    ],

    'items_per_page' => 1
];
