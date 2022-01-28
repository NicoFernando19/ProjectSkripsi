<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyType;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyType::create([
            "id" => 1,
            "type_name" => "CV"
        ]);
        CompanyType::create([
            "id" => 2,
            "type_name" => "PT"
        ]);
        CompanyType::create([
            "id" => 3,
            "type_name" => "Perseorangan"
        ]);
        CompanyType::create([
            "id" => 4,
            "type_name" => "Koperasi"
        ]);
        CompanyType::create([
            "id" => 5,
            "type_name" => "Firma"
        ]);
        CompanyType::create([
            "id" => 6,
            "type_name" => "Persero"
        ]);
        CompanyType::create([
            "id" => 7,
            "type_name" => "Ltd"
        ]);
    }
}
