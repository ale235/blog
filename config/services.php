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
    
    //https://www.youtube.com/watch?v=SvJ8cssqAo4
    //http://goodheads.io/2015/08/24/using-facebook-authentication-for-login-in-laravel-5/
    //http://goodheads.io/2015/08/24/using-twitter-authentication-for-login-in-laravel-5/
    //http://itsolutionstuff.com/post/laravel-5-login-with-linkedin-using-socialite-packageexample.html
    //https://blog.damirmiladinov.com/laravel/laravel-5.2-socialite-google-login.html#.WFhiPlxvDj8
    
    'github' => [  // change it to any provider
        'client_id' => 'your-github-app-id',
        'client_secret' => 'your-github-app-secret',
        'redirect' => 'http://your-callback-url',
    ],

];
