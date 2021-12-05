<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'test',
            'username' => 'test',
            'email' => 'nicofernando39@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123')
        ]);

        Company::create([
            'name' => 'testing',
            'username' => 'testing',
            'email' => 'nicofernando1907@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123')
        ]);
    }
}
