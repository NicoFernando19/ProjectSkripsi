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
            "type_name" => "CV"
        ]);
        CompanyType::create([
            "type_name" => "PT"
        ]);
        CompanyType::create([
            "type_name" => "Perseorangan"
        ]);
        CompanyType::create([
            "type_name" => "Koperasi"
        ]);
        CompanyType::create([
            "type_name" => "Firma"
        ]);
        CompanyType::create([
            "type_name" => "Persero"
        ]);
        CompanyType::create([
            "type_name" => "Ltd"
        ]);
    }
}
