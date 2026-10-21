<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PageCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['english', 'general_knowledge', 'mathematics', 'others', 'science', 'social_studies', 'tamil'];
        $now = date("Y-m-d H:i:s");

        foreach ($categories as $category) {
            DB::table('class_room_page_categories')->updateOrInsert(
                [
                    'school_id'        => 1,
                    'academic_year_id' => 1,
                    'name'             => $category,
                ],
                [
                    'status'     => '1',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
