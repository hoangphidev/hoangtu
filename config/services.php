<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'google' => [
        'client_id' => '519932308111-a878rfi2oojfopeuho3q0p0ebrcva666.apps.googleusercontent.com',
        'client_secret' => 'vZz-tBlVrzMj-AYO1z6pZhXR',
        'redirect' => 'http://localhost/hoangtu/public/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '791442941667545',
        'client_secret' => 'e731150f98ce9bd10c6b09957574efad',
        'redirect' => 'http://localhost/hoangtu/public/login/facebook/callback',
    ],

];
