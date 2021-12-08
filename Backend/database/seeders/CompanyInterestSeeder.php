<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyInterest;

class CompanyInterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyInterest::create([
            'company_id' => 1,
            'companyName' => 'Maju Jaya',
            'companyType' => 'Indus',
            'jobDesc' => 'This is company details',
            'NumOfWorkforce' => 3,
            'price' => 'Rp. Sekian',
            'specification' => 'spec'
        ]);

        CompanyInterest::create([
            'company_id' => 3,
            'companyName' => 'Kaleng',
            'companyType' => 'Indus',
            'jobDesc' => 'This is company details',
            'NumOfWorkforce' => 6,
            'price' => 'Rp. Sekian',
            'specification' => 'spec'
        ]);
    }
}
