<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create(
            [
                'company_id' => 2,
                'email' => 'arifin@gmail.com',
                'name' => 'M. Arifin',
                'DoB' => Carbon::parse("2000-2-12"),
                'phoneNumber' => '87852091016',
                'address' => 'Jl. Penerbangan Panjang no. 12, Jakarta',
                'country' => 'Indonesia',
                'city' => 'Jakarta',
                'about' => 'Ambitious People',
                'countryCode' => '62',
                'jobTitle' => 'Security',
                'jobDesc' => 'Responsibility to manage office',
                'imgName' => 'user.jpg',
                'docName' => 'tes.pdf'
            ]
        );
        Employee::create(
            [
                'company_id' => 2,
                'email' => 'supardi@gmail.com',
                'name' => 'Supardi Salaman',
                'DoB' => Carbon::parse("2000-3-11"),
                'phoneNumber' => '82124732277',
                'address' => 'Jl. Penerbangan Panjang no. 12, Lampung',
                'country' => 'Indonesia',
                'city' => 'Bandar Lampung',
                'about' => 'Ambitious People',
                'jobTitle' => 'Cleaning Service',
                'countryCode' => '62',
                'jobDesc' => 'Responsibility to clean every corner in the office',
                'imgName' => 'user.jpg',
                'docName' => 'tes.pdf'
            ]
        );
        Employee::create(
            [
                'company_id' => 2,
                'email' => 'sulaiman@gmail.com',
                'name' => 'Sulaiman Salaman',
                'DoB' => Carbon::parse("2000-3-11"),
                'phoneNumber' => '82124732277',
                'address' => 'Jl. Penerbangan Panjang no. 12, Lampung',
                'country' => 'Indonesia',
                'city' => 'Bandar Lampung',
                'about' => 'Ambitious People',
                'jobTitle' => 'Cleaning Service',
                'countryCode' => '62',
                'jobDesc' => 'Responsibility to clean every corner in the office',
                'imgName' => 'user.jpg',
                'docName' => 'tes.pdf'
            ]
        );
        Employee::create(
            [
                'company_id' => 2,
                'email' => 'Wahyu@gmail.com',
                'name' => 'Wahyu Putra',
                'DoB' => Carbon::parse("2000-3-11"),
                'phoneNumber' => '82124732277',
                'address' => 'Jl. Penerbangan Panjang no. 12, Lampung',
                'country' => 'Indonesia',
                'city' => 'Bandar Lampung',
                'about' => 'Ambitious People',
                'jobTitle' => 'Cleaning Service',
                'countryCode' => '62',
                'jobDesc' => 'Responsibility to clean every corner in the office',
                'imgName' => 'user.jpg',
                'docName' => 'tes.pdf'
            ]
        );
        Employee::create(
            [
                'company_id' => 2,
                'email' => 'christopher@gmail.com',
                'name' => 'Christopher Linting',
                'DoB' => Carbon::parse("2000-3-11"),
                'phoneNumber' => '82124732277',
                'address' => 'Jl. Penerbangan Panjang no. 12, Lampung',
                'country' => 'Indonesia',
                'city' => 'Bandar Lampung',
                'about' => 'Ambitious People',
                'jobTitle' => 'Cleaning Service',
                'countryCode' => '62',
                'jobDesc' => 'Responsibility to clean every corner in the office',
                'imgName' => 'user.jpg',
                'docName' => 'tes.pdf'
            ]
        );
    }
}
