<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notifications = [
            [
                'id' => '22f33755-8db7-440b-a5ee-74d13120ac81',
                'type' => 'App\Notifications\NewMessageNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => 2,
                'data' => '{"data":"You Have Been Removed From Video Room"}',
                'read_at' => null,
            ],
            [
                'id' => '5a18e09a-48c7-4321-a67a-b598c0ca8a11',
                'type' => 'App\Notifications\NewMessageNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => 2,
                'data' => '{"data":"Briana Wiegand Disliked Comment In Your Post"}',
                'read_at' => null,
            ],
            [
                'id' => '943c310f-1535-42ab-8573-2aa3cb83b842',
                'type' => 'App\Notifications\NewMessageNotification',
                'notifiable_type' => 'App\Models\User',
                'notifiable_id' => 2,
                'data' => '{"data":"Briana Wiegand Removed Dislike For Comment In Your Post"}',
                'read_at' => null,
            ],
        ];

        $now = date("Y-m-d H:i:s");

        foreach ($notifications as $notification) {
            DB::table('notifications')->updateOrInsert(
                ['id' => $notification['id']], // Match by UUID primary key
                [
                    'type' => $notification['type'],
                    'notifiable_type' => $notification['notifiable_type'],
                    'notifiable_id' => $notification['notifiable_id'],
                    'data' => $notification['data'],
                    'read_at' => $notification['read_at'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
