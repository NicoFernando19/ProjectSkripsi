<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted',
            'read_at' => Carbon::now()
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by s',
            'vacancyLink' => '/vacancy/detail?id=1'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sa'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sd'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sw'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sz'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sq'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sg'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sv'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sb'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sc'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sx'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sm'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sn'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sh'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by si'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sp'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sy'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by so'
        ]);

        Notification::create([
            'type' => 'Notification',
            'company_id' => 1,
            'data' => 'Your application has been accepted by sj'
        ]);
    }
}
