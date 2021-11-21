<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

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
            'user_id' => 1,
            'data' => 'Your application has been accepted'
        ]);
    }
}
