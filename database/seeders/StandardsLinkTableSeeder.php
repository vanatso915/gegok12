<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Helpers\SiteHelper;
use App\Models\StandardLink;
use App\Models\RoleUser;
use App\Models\Standard;
use App\Models\Section;
use App\Models\School;
use App\Models\User;

class StandardsLinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'development') 
        {
            $schools = School::where('status', 1)->get();
            foreach ($schools as $school) 
            {
                $standards = Standard::where('school_id', $school->id)->get();
                $sections = Section::where('school_id', $school->id)->get();
                
                // Fetch teachers (usergroup_id = 5)
                $teachers = User::where([['school_id', $school->id], ['usergroup_id', 5]])->pluck('id')->toArray();

                // Fallback: If no teachers found with group 5, grab any user from this school so seeding doesn't fail
                if (empty($teachers)) {
                    $teachers = User::where('school_id', $school->id)->pluck('id')->toArray();
                }

                // If still completely empty, skip this school
                if (empty($teachers)) {
                    continue;
                }

                foreach ($standards as $stdKey => $standard)
                {
                    foreach ($sections as $secKey => $section)
                    {
                        $academic_year = SiteHelper::getAcademicyear($school->id);
                        $sectionRef = ($stdKey * $sections->count() + $secKey) % count($teachers); // Prevent out-of-bounds error
                        $teacherId = $teachers[$sectionRef];

                        StandardLink::factory(1)->create([
                            'school_id'         => $standard->school_id,
                            'academic_year_id'  => $academic_year->id,
                            'standard_id'       => $standard->id,
                            'section_id'        => $section->id,
                            'class_teacher_id'  => $teacherId
                        ]);

                        RoleUser::factory(1)->create([
                            'user_id'   => $teacherId,
                            'role_id'   => 4, 
                        ]);
                    }
                }
            }
        }
    }
}
