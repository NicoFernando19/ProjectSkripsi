<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JoinedCompany;

class JoinedCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JoinedCompany::create([
            'vacancy_id' => 1,
            'company_interest_id' => 1
        ]);

        JoinedCompany::create([
            'vacancy_id' => 1,
            'company_interest_id' => 2
        ]);
    }
}
