<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'facebook' => [
        'client_id' => '332681057149314',
        'client_secret' => '60f9ed18af574b5b415064209ed01e7c',
        'redirect' => 'http://ecomert.ezyro.com/login-back/facebook',
    ],
    
    'google' => [
        'client_id' =>'225575371282-t2muhht83rv6ahldndk7ogb06keja59c.apps.googleusercontent.com',
        'client_secret' => 'xB2Cf09CLjGs2SeCCi9sGfet',
        'redirect' => 'http://ecomert.ezyro.com/login-back/google',
    ],

];
