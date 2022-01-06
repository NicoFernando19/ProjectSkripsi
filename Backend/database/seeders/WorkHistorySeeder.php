<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkHistory;
use Carbon\Carbon;

class WorkHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkHistory::create([
            'company_id' => 1,
            'Title' => 'Work in Basdwh',
            'startDate' => Carbon::parse('2020-10-11'),
            'endDate' => Carbon::parse('2021-11-11')
        ]);
    }
}
