<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolDetailsTableSeeder extends Seeder
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

        $keys = [
            'about_us', 
            'admission_open', 
            'admission_close_message', 
            'admission_close_on', 
            'affiliation_no', 
            'affiliated_by', 
            'date_of_establishment', 
            'landline_no', 
            'moto', 
            'website'
        ];

        // Default meta values for all active schools
        foreach ($schools as $school) {
            foreach ($keys as $key) {
                DB::table('school_details')->updateOrInsert(
                    [
                        'school_id' => $school->id,
                        'meta_key'  => $key,
                    ],
                    [
                        'meta_value' => '-',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            }
        }

        // Specific overrides/additions for school_id => 1
        $specificDetails = [
            [
                'meta_key'   => 'board',
                'meta_value' => 'matric',
            ],
            [
                'meta_key'   => 'school_logo',
                'meta_value' => '/uploads/demologo.png',
            ],
        ];

        foreach ($specificDetails as $detail) {
            DB::table('school_details')->updateOrInsert(
                [
                    'school_id' => 1,
                    'meta_key'  => $detail['meta_key'],
                ],
                [
                    'meta_value' => $detail['meta_value'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
