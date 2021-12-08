<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacancy;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacancy::create([
            'company_id' => 1,
            'Title' => 'Vacancy 1',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 1,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 1,
            'Title' => 'Vacancy 2',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);
    }
}
