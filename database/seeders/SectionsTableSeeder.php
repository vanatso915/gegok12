<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\School;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::where('status', 1)->get();
        $now = date("Y-m-d H:i:s");
        $sections = ['A', 'B'];

        foreach ($schools as $school) 
        {
            foreach ($sections as $section) 
            {
                DB::table('sections')->updateOrInsert(
                    [
                        'school_id' => $school->id,
                        'name'      => $section,
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
}
