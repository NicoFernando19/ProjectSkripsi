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
            'id' => 1,
            'company_id' => 16,
            'Title' => 'Janitor',
            'jobType' => 'Janitor',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 2,
            'company_id' => 1,
            'Title' => 'Customer Service',
            'jobType' => 'CS (Customer Service)',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 3,
            'company_id' => 1,
            'Title' => 'IT Resources',
            'jobType' => 'IT',
            'jobDesc' => 'Taking care of Computer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 4,
            'company_id' => 3,
            'Title' => 'Sales',
            'jobType' => 'Sales',
            'jobDesc' => 'Sale our product',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 5,
            'company_id' => 3,
            'Title' => 'Accountant',
            'jobType' => 'Accounting',
            'jobDesc' => 'Calculate every sales',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 6,
            'company_id' => 4,
            'Title' => 'Security Guard',
            'jobType' => 'Security Guard',
            'jobDesc' => 'security officers are tasked with securing the premises and personnel by staying on patrol',
            'NumWorkforce' => 10,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 7,
            'company_id' => 4,
            'Title' => 'Personal Assistant',
            'jobType' => 'Personal Assistant',
            'jobDesc' => 'Work with CEO to manage everything',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 8,
            'company_id' => 6,
            'Title' => 'IT Support',
            'jobType' => 'IT support',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 3,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 9,
            'company_id' => 6,
            'Title' => 'Marketing',
            'jobType' => 'Marketing',
            'jobDesc' => 'Market',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 10,
            'company_id' => 7,
            'Title' => 'Writer',
            'jobType' => 'Writer',
            'jobDesc' => 'Write anything',
            'NumWorkforce' => 7,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 11,
            'company_id' => 7,
            'Title' => 'Copywriter',
            'jobType' => 'Copywriter',
            'jobDesc' => 'Copywriter',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 12,
            'company_id' => 9,
            'Title' => 'Web Developer',
            'jobType' => 'IT',
            'jobDesc' => 'Creating Web',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 13,
            'company_id' => 9,
            'Title' => 'Payroll Clerk',
            'jobType' => 'Payroll Clerk',
            'jobDesc' => 'Manage payment process',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 14,
            'company_id' => 10,
            'Title' => 'Cleaning Service',
            'jobType' => 'Cleaning Service',
            'jobDesc' => 'Clean all the office',
            'NumWorkforce' => 17,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 15,
            'company_id' => 10,
            'Title' => 'Gardener',
            'jobType' => 'Gardener',
            'jobDesc' => 'Taking care of a garden',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 16,
            'company_id' => 12,
            'Title' => 'Designer',
            'jobType' => 'Designer',
            'jobDesc' => 'Design everything',
            'NumWorkforce' => 4,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 17,
            'company_id' => 12,
            'Title' => 'Developer',
            'jobType' => 'Developer',
            'jobDesc' => 'Produce music',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);

        Vacancy::create([
            'id' => 18,
            'company_id' => 17,
            'Title' => 'Cleaning Service',
            'jobType' => 'Cleaning Service',
            'jobDesc' => 'Taking care of customer',
            'NumWorkforce' => 2,
            'Budget' => 'Rp. 500.000',
            'Requirement' => 'Must be Qualified'
        ]);
    }
}
