<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create(
            [
                'email' => 'employee@gmail.com',
                'password' => app('hash')->make('123123123'),
                'username' => 'admin1'
            ]
        );
        Employee::create(
            [
                'email' => 'employee2@gmail.com',
                'password' => app('hash')->make('123123123'),
                'username' => 'employee1'
            ]
        );
    }
}
