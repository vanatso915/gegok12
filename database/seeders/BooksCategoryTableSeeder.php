<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\School;

class BooksCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::where('status', 1)->get();
        $categories = [
            'Astro Physics', 
            'Arts', 
            'Comics', 
            'Computer Science', 
            'History', 
            'Music', 
            'Technology', 
            'Magazines', 
            'Question Bank', 
            'Projects'
        ];
        $now = date("Y-m-d H:i:s");

        foreach ($schools as $school) {
            foreach ($categories as $category) {
                DB::table('books_category')->updateOrInsert(
                    [
                        'school_id' => $school->id,
                        'category'  => $category,
                    ],
                    [
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            }
        }
    }
}
