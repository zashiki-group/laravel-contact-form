<?php

return [
    'from' => [
        'name' => env('CONTACT_FROM_NAME'),
        'address' => env('CONTACT_FROM_ADDRESS'),
    ],
    'to' => env('CONTACT_TO'),
    'cc' => env('CONTACT_CC'),
    'bcc' => env('CONTACT_BCC'),
    'subject' => [
        'customer' => env('CONTACT_SUBJECT_CUSTOMER'),
        'company' => env('CONTACT_SUBJECT_COMPANY'),
    ],

    'key' => [
        'email' => 'メールアドレス',
        'name' => 'お名前',
    ],
    'validation' => [
        'お名前' => 'required|string',
        'メールアドレス' => 'required|email',
        'お問い合わせ内容' => 'nullable|string'
    ]
];
