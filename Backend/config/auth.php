<?php
return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'companies',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'companies',
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