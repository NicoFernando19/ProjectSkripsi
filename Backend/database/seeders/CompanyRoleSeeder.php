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
    }
}
