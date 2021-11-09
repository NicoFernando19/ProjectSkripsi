<?php
return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
        'employee' => [
            'driver' => 'jwt',
            'provider' => 'employees',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\Models\User::class
        ],
        'employees' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Employee::class
        ]
    ]
];