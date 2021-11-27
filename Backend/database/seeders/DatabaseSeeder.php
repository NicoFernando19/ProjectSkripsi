<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(CompanyTypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(CompanySeeder::class);
    }
}
