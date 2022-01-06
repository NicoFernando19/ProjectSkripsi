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
            'name' => 'Maju Jaya',
            'username' => 'Maju Jaya',
            'email' => 'nicofernando39@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'Technology',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Tigaraksa',
            'username' => 'Tigaraksa',
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
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Kaleng',
            'username' => 'Kaleng',
            'email' => 'nicofernando@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 3,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Listrik',
            'username' => 'Listrik',
            'email' => 'listrik@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'PAM',
            'username' => 'PAM',
            'email' => 'pam@gmail.com',
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
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Keyboard',
            'username' => 'Keyboard',
            'email' => 'keyboard@gmail.com',
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
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Customer Service',
            'username' => 'Customer Service',
            'email' => 'cs@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Setia',
            'username' => 'Setia',
            'email' => 'setia@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Container',
            'username' => 'Container',
            'email' => 'container@gmail.com',
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
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Plastik',
            'username' => 'Plastik',
            'email' => 'plastik@gmail.com',
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
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Kertas',
            'username' => 'Kertas',
            'email' => 'kertas@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);

        Company::create([
            'name' => 'Multiguna',
            'username' => 'Multiguna',
            'email' => 'multiguna@gmail.com',
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
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia'
        ]);
    }
}
