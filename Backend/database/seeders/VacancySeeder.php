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
            'Title' => 'Need Customer Service',
            'jobType' => 'CS (Customer Service)',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 1,
            'Title' => 'Need IT Resources',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 3,
            'Title' => 'Need Sales',
            'jobType' => 'Sales',
            'jobDesc' => 'Sale our product',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 3,
            'Title' => 'Need Accountant',
            'jobType' => 'Accounting',
            'jobDesc' => 'Calculate every sales',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 4,
            'Title' => 'Need Security Guard',
            'jobType' => 'Security Guard',
            'jobDesc' => 'security officers are tasked with securing the premises and personnel by staying on patrol',
            'NumWorkforce' => 10,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 4,
            'Title' => 'Need Personal Assistant',
            'jobType' => 'Personal Assistant',
            'jobDesc' => 'Work with CEO to manage everything',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 6,
            'Title' => 'Need IT Support',
            'jobType' => 'IT support',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 3,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 6,
            'Title' => 'Need Marketing',
            'jobType' => 'Marketing',
            'jobDesc' => 'Market',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 7,
            'Title' => 'Need Writer',
            'jobType' => 'Writer',
            'jobDesc' => 'Write anything',
            'NumWorkforce' => 7,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 7,
            'Title' => 'Need Copywriter',
            'jobType' => 'Copywriter',
            'jobDesc' => 'Copywriter',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 9,
            'Title' => 'Need Web Developer',
            'jobType' => 'IT',
            'jobDesc' => 'Creating Web',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 9,
            'Title' => 'Need Payroll Clerk',
            'jobType' => 'Payroll Clerk',
            'jobDesc' => 'Manage payment process',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 10,
            'Title' => 'Need Cleaning Service',
            'jobType' => 'Cleaning Service',
            'jobDesc' => 'Clean all the office',
            'NumWorkforce' => 17,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 10,
            'Title' => 'Need Gardener',
            'jobType' => 'Gardener',
            'jobDesc' => 'Taking care of a garden',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 12,
            'Title' => 'Need Designer',
            'jobType' => 'Designer',
            'jobDesc' => 'Design everything',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'company_id' => 12,
            'Title' => 'Need Musician',
            'jobType' => 'Musician',
            'jobDesc' => 'Produce music',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);
    }
}
