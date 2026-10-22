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

                // SELF-HEALING: If no teachers exist, create a fallback teacher on the fly
                if (empty($teachers)) {
                    $fallbackTeacher = User::create([
                        'school_id'    => $school->id,
                        'usergroup_id' => 5,
                        'name'         => 'Default Teacher',
                        'email'        => 'teacher_' . $school->id . '@mailinator.com',
                        'password'     => bcrypt('password'),
                        'status'       => 1,
                    ]);
                    $teachers = [$fallbackTeacher->id];
                }

                foreach ($standards as $stdKey => $standard)
                {
                    foreach ($sections as $secKey => $section)
                    {
                        $academic_year = SiteHelper::getAcademicyear($school->id);
                        
                        // Safe modulo indexing in case there are more sections than teachers
                        $sectionRef = ($stdKey * $sections->count() + $secKey) % count($teachers);
                        $teacherId = $teachers[$sectionRef];

                        StandardLink::factory(1)->create([
                            'school_id'         => $standard->school_id,
                            'academic_year_id'  => $academic_year->id,
                            'standard_id'       => $standard->id,
                            'section_id'        => $section->id,
                            'class_teacher_id'  => $teacherId
                        ]);

                        RoleUser::firstOrCreate([
                            'user_id'   => $teacherId,
                            'role_id'   => 4, 
                        ]);
                    }
                }
            }
        }
    }
}
