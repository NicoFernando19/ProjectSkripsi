<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'vacancy_id' => 1,
            'company_id' => 2
        ]);

        Transaction::create([
            'vacancy_id' => 1,
            'company_id' => 3
        ]);
    }
}
