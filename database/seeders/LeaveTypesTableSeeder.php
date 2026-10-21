<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\AcademicYear;
use App\Models\School;

class LeaveTypesTableSeeder extends Seeder
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

        $leaveTypes = [
            ['name' => 'Earned Leave or Privilege Leave', 'max_no_of_days' => 2],
            ['name' => 'Casual Leave', 'max_no_of_days' => 1],
            ['name' => 'Sick Leave or Medical Leave', 'max_no_of_days' => 1],
            ['name' => 'Maternity Leave', 'max_no_of_days' => 45],
            ['name' => 'Quarantine Leave', 'max_no_of_days' => 5],
            ['name' => 'Study Leave or Sabbatical Leave', 'max_no_of_days' => 7],
        ];

        foreach ($schools as $school) {
            $academic_year = AcademicYear::where([
                ['school_id', $school->id],
                ['status', 1]
            ])->first();

            // Skip this school if no active academic year is found
            if (!$academic_year) {
                continue;
            }

            foreach ($leaveTypes as $leave) {
                DB::table('leave_types')->updateOrInsert(
                    [
                        'school_id' => $school->id,
                        'name'      => $leave['name'],
                    ],
                    [
                        'academic_year_id' => $academic_year->id,
                        'max_no_of_days'   => $leave['max_no_of_days'],
                        'status'           => 1,
                        'created_at'       => $now,
                        'updated_at'       => $now,
                    ]
                );
            }
        }
    }
}
