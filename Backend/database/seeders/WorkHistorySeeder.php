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
            "id" => 1,
            'company_id' => 2,
            'Title' => 'Work with CV Maju Jaya',
            'startDate' => Carbon::parse('2020-10-11'),
            'endDate' => Carbon::parse('2021-11-11')
        ]);

        WorkHistory::create([
            "id" => 2,
            'company_id' => 5,
            'Title' => 'Work with PT Keyboard',
            'startDate' => Carbon::parse('2020-10-11'),
            'endDate' => Carbon::parse('2021-11-11')
        ]);

        WorkHistory::create([
            "id" => 3,
            'company_id' => 8,
            'Title' => 'Work with CV Plastik',
            'startDate' => Carbon::parse('2020-10-11'),
            'endDate' => Carbon::parse('2021-11-11')
        ]);

        WorkHistory::create([
            "id" => 4,
            'company_id' => 11,
            'Title' => 'Work with CV Maju Jaya',
            'startDate' => Carbon::parse('2020-10-11'),
            'endDate' => Carbon::parse('2021-11-11')
        ]);

        WorkHistory::create([
            "id" => 5,
            'company_id' => 2,
            'Title' => 'Work with Perseroan Kaleng',
            'startDate' => Carbon::parse('2020-10-11'),
            'endDate' => Carbon::parse('2021-11-11')
        ]);

        WorkHistory::create([
            "id" => 6,
            'company_id' => 5,
            'Title' => 'Work with CV Kertas',
            'startDate' => Carbon::parse('2020-10-11'),
            'endDate' => Carbon::parse('2021-11-11')
        ]);
    }
}
