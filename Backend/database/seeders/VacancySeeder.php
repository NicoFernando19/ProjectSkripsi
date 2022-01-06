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
            'Title' => 'Job',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 1,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 1,
            'Title' => 'Vacancy',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 3,
            'Title' => 'Job 2',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 1,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 3,
            'Title' => 'Vacancy 2',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 4,
            'Title' => 'Job 3',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 10,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 4,
            'Title' => 'Vacancy 3',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 6,
            'Title' => 'Job 4',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 3,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 6,
            'Title' => 'Vacancy 4',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 7,
            'Title' => 'Job 5',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 17,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 7,
            'Title' => 'Vacancy 5',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 9,
            'Title' => 'Job 6',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 9,
            'Title' => 'Vacancy 6',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 10,
            'Title' => 'Job 7',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 17,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 10,
            'Title' => 'Vacancy 7',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 12,
            'Title' => 'Job 8',
            'jobType' => 'CS',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 12,
            'Title' => 'Vacancy 8',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);
    }
}
