<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\AcademicYear;
use App\Models\School;

class ScholasticGradesTableSeeder extends Seeder
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

        $gradingMethods = ['cbse', 'passfail'];

        foreach ($schools as $school) {
            $academic_year = AcademicYear::where([
                ['school_id', $school->id],
                ['status', 1]
            ])->first();

            // Skip this school if no active academic year is found
            if (!$academic_year) {
                continue;
            }

            foreach ($gradingMethods as $method) {
                DB::table('sc_grade')->updateOrInsert(
                    [
                        'school_id'      => $school->id,
                        'grade_name'     => 'scholastic',
                        'grading_method' => $method,
                    ],
                    [
                        'academic_year_id' => $academic_year->id,
                        'created_at'       => $now,
                        'updated_at'       => $now,
                    ]
                );
            }
        }
    }
}
