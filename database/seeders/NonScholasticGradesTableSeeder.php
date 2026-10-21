<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\AcademicYear;
use App\Models\School;

class NonScholasticGradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::where('status', 1)->get();

        foreach ($schools as $school) {
            $academic_year = AcademicYear::where([['school_id', $school->id], ['status', 1]])->first();

            if (!$academic_year) {
                continue; // Skip if no active academic year exists for this school
            }

            $grades = [
                [
                    'grade_name' => '1-5',
                    'keys' => '"art_education", "physical_education", "work_education"',
                ],
                [
                    'grade_name' => '6-8',
                    'keys' => '"thinking_skills", "social_skills", "emotional_skills"',
                ],
                [
                    'grade_name' => '9-10',
                    'keys' => '"attitude_values", "wellness_education", "service_activities"',
                ],
                [
                    'grade_name' => '11-12',
                    'keys' => '"thinking_skills", "physical_education", "work_education"',
                ],
            ];

            $now = date("Y-m-d H:i:s");

            foreach ($grades as $grade) {
                DB::table('non_sc_grade')->updateOrInsert(
                    [
                        'school_id' => $school->id,
                        'grade_name' => $grade['grade_name'],
                    ],
                    [
                        'academic_year_id' => $academic_year->id,
                        'keys' => $grade['keys'],
                        'grades_details' => '{ "A": "Outstanding", "B": "Above Average", "C": "Needs Improvement"}',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            }
        }
    }
}
