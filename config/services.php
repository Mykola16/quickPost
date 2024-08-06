<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google' => [

        'client_id' => '348981366457-6aod65k9i74qurhua450s82csqr5qph0.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
//        'redirect' => 'http://quickpostapp.kesug.com/auth/google/callback',
    ],

    'facebook' => [

        'client_id' => '1120966038973406',
        'client_secret' => '2b3352058748fbe45ea9c6f9764900c7',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
//        'redirect' => 'http://quickpostapp.kesug.com/auth/facebook/callback',
    ],

];
