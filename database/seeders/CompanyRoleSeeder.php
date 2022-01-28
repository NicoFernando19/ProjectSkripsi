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
            "id" => 1,
            'company_id' => 1,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 2,
            'company_id' => 2,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 3,
            'company_id' => 3,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 4,
            'company_id' => 4,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 5,
            'company_id' => 5,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 6,
            'company_id' => 6,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 7,
            'company_id' => 7,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 8,
            'company_id' => 8,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 9,
            'company_id' => 9,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 10,
            'company_id' => 10,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 11,
            'company_id' => 11,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 12,
            'company_id' => 12,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 13,
            'company_id' => 13,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 14,
            'company_id' => 14,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 15,
            'company_id' => 15,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 16,
            'company_id' => 16,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 17,
            'company_id' => 17,
            'role_id' => 3
        ]);

        CompanyRole::create([
            "id" => 18,
            'company_id' => 18,
            'role_id' => 2
        ]);

        CompanyRole::create([
            "id" => 19,
            'company_id' => 19,
            'role_id' => 2
        ]);
    }
}
