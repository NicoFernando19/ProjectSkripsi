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
        // $this->call(EmployeeSeeder::class);
        $this->call(CompanyTypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(CompanyRoleSeeder::class);
        // $this->call(NotificationSeeder::class);
        $this->call(VacancySeeder::class);
        // $this->call(CompanyInterestSeeder::class);
        // $this->call(JoinedCompanySeeder::class);
        $this->call(WorkHistorySeeder::class);
        // $this->call(ContractSeeder::class);
        // $this->call(DocumentSeeder::class);
    }
}
