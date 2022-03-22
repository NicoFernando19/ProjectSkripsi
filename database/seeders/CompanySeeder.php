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
            'id' => 1,
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
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 2,
            'name' => 'Fakery',
            'username' => 'Fakery',
            'email' => 'nicofernando1907@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'Company2.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 3,
            'name' => 'Factory',
            'username' => 'Factory',
            'email' => 'factory@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company3.png',
            'company_type_id' => 3,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 4,
            'name' => 'Quadra',
            'username' => 'Quadra',
            'email' => 'quadra@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Security',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company4.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 5,
            'name' => 'Blacks',
            'username' => 'Blacks',
            'email' => 'blacks@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company5.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 6,
            'name' => 'Millets',
            'username' => 'Millets',
            'email' => 'millets@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company6.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 7,
            'name' => 'Customer Service',
            'username' => 'Customer Service',
            'email' => 'cs@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Outsource',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company13.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 8,
            'name' => 'Croft\'s Accountant',
            'username' => 'Croft\'s Accountant',
            'email' => 'ca@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Accountant',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company15.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 9,
            'name' => 'Monero',
            'username' => 'Monero',
            'email' => 'monero@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Teknologi dan komunikasi',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'Company16.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 10,
            'name' => 'Cheshire County',
            'username' => 'Cheshire County',
            'email' => 'cc@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Office Services',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company17.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 11,
            'name' => 'Home Energy',
            'username' => 'Home Energy',
            'email' => 'he@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Home Services',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company18.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 12,
            'name' => 'Ecoriginal',
            'username' => 'Ecoriginal',
            'email' => 'ecoriginal@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Tech',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company12.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 13,
            'name' => 'Vista Homes',
            'username' => 'Vista Homes',
            'email' => 'vh@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Office and Home Services',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company19.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 14,
            'name' => 'Zona Celaya',
            'username' => 'Zona Celaya',
            'email' => 'zc@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Outsource',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company20.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 15,
            'name' => 'BAAX',
            'username' => 'BAAX',
            'email' => 'baax@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Outsource',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'Company21.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 16,
            'name' => 'Humanetics',
            'username' => 'Humanetics',
            'email' => 'humanet@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Outsource',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company22.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 17,
            'name' => 'Techno',
            'username' => 'Techno',
            'email' => 'techno@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://webiste.com',
            'BidangUsaha' => 'Technology and Informatics',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company23.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 3
        ]);

        Company::create([
            'id' => 18,
            'name' => 'Mier Esparza',
            'username' => 'Mier Esparza',
            'email' => 'me@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Technology',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company24.png',
            'company_type_id' => 1,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);

        Company::create([
            'id' => 19,
            'name' => 'House Flipping',
            'username' => 'House Flipping',
            'email' => 'hflip@gmail.com',
            'phoneNumber' => '0812232312',
            'TanggalBerdiri' => Carbon::now(),
            'WebsiteUrl' => 'https://website.com',
            'BidangUsaha' => 'Outsource',
            'Industri' => 'this',
            'SubIndustri' => 'Sub Industri',
            'about' => 'This is company details',
            'address' => 'This is company address',
            'imgName' => 'company25.png',
            'company_type_id' => 2,
            'password' => app('hash')->make('123123123'),
            'country' => 'Indonesia',
            'role_id' => 2
        ]);
    }
}
