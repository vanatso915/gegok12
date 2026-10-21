<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AbsentReasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        $absentReasons = ['Health Issue', 'Family Functions', 'Personal Work', 'Others'];

        foreach ($absentReasons as $reason) 
        {
            DB::table('absent_reasons')->updateOrInsert(
                ['title' => $reason], // Search criteria to prevent duplicates
                [
                    'status'     => '1',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
