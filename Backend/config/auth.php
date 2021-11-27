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
        'company' => [
            'driver' => 'jwt',
            'provider' => 'companies',
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
        ],
        'companies' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Company::class
        ]
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'employees' => [
            'provider' => 'employees',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'companies' => [
            'provider' => 'companies',
            'table' => 'password_resets',
            'expire' => 60,
        ]
    ]
];