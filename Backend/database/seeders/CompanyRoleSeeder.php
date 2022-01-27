<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyRole;

class CompanyRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyRole::create([
            'company_id' => 1,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 2,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 3,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 4,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 5,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 6,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 7,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 8,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 9,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 10,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 11,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 12,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 13,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 14,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 15,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 16,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 17,
            'role_id' => 3
        ]);

        CompanyRole::create([
            'company_id' => 18,
            'role_id' => 2
        ]);

        CompanyRole::create([
            'company_id' => 19,
            'role_id' => 2
        ]);
    }
}
