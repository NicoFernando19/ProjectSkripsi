<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;
use Carbon\Carbon;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::create([
            'company_id' => 1,
            'vendor_id' => 2,
            'workforce' => 10,
            'jobFunction' => 'CS (Customer Service)',
            'jobDesc' => 'This is Job Description',
            'start_date' => Carbon::parse('2020-12-12'),
            'end_date' => Carbon::parse('2025-12-12'),
            'requirement' => 'this is requirement',
            'document' => '0.02806400_1641145032.pdf'
        ]);

        Contract::create([
            'company_id' => 3,
            'vendor_id' => 4,
            'workforce' => 10,
            'jobFunction' => 'IT',
            'jobDesc' => 'This is Job Description',
            'start_date' => Carbon::parse('2020-12-12'),
            'end_date' => Carbon::parse('2025-12-12'),
            'requirement' => 'this is requirement',
            'document' => '0.02806400_1641145032.pdf'
        ]);
    }
}
