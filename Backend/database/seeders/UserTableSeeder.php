<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'test',
                'username' => 'test',
                'email' => 'nicofernando39@gmail.com',
                'password' => app('hash')->make('123123123')
            ]
        );
    }
}
