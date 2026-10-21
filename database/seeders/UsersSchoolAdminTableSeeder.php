<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicYear;
use App\Models\School;
use App\Models\User;
use App\Models\Userprofile;
use App\Models\TeacherProfile;

class UsersSchoolAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::where('status', 1)->get();

        foreach ($schools as$school) {

            // Admin
            $schoolAdmin = User::firstOrCreate(
                ['name' => 'demoschool' . $school->id],
                array_merge(User::factory()->raw(), [
                    'school_id'    => $school->id,
                    'name'         => 'demoschool' . $school->id,
                    'email'        => 'demoschool' . $school->id . '@mailinator.com',
                    'mobile_no'    => '2230456789',
                    'usergroup_id' => 3
                ])
            );

            Userprofile::updateOrCreate(
                ['user_id' => $schoolAdmin->id],
                [
                    'school_id'     => $school->id,
                    'usergroup_id'  => 3,
                    'firstname'     => 'demo',
                    'lastname'      => 'school',
                    'profession'    => 'admin',
                    'address'       => 'Namakkal,Tamilnadu,India',
                    'country_id'    => 7,
                    'city_id'       => 31,
                    'state_id'      => 24,
                    'pincode'       => '625001'
                ]
            );

            // Librarian
            $librarian = User::firstOrCreate(
                ['name' => 'librarian' . $school->id],
                array_merge(User::factory()->raw(), [
                    'school_id'    => $school->id,
                    'name'         => 'librarian' . $school->id,
                    'email'        => 'librarian' . $school->id . '@mailinator.com',
                    'mobile_no'    => '2230456701',
                    'usergroup_id' => 8
                ])
            );

            Userprofile::updateOrCreate(
                ['user_id' => $librarian->id],
                [
                    'school_id'     => $librarian->school_id,
                    'usergroup_id'  => $librarian->usergroup_id,
                    'firstname'     => 'librarian',
                    'lastname'      => 'librarian',
                    'profession'    => 'librarian',
                    'address'       => 'Namakkal,Tamilnadu,India',
                    'country_id'    => 7,
                    'city_id'       => 31,
                    'state_id'      => 24,
                    'pincode'       => '625001'
                ]
            );

            $academicYear = AcademicYear::where([
                ['school_id', $school->id],
                ['status', 1]
            ])->first();

            if ($academicYear) {
                TeacherProfile::updateOrCreate(
                    [
                        'user_id'          => $librarian->id,
                        'academic_year_id' => $academicYear->id
                    ],
                    [
                        'school_id'         => $librarian->school_id,
                        'designation'       => 'librarian',
                        'status'            => 1,
                    ]
                );
            }

            // Receptionist
            $receptionist = User::firstOrCreate(
                ['name' => 'receptionist' . $school->id],
                array_merge(User::factory()->raw(), [
                    'school_id'    => $school->id,
                    'name'         => 'receptionist' . $school->id,
                    'email'        => 'receptionist' . $school->id . '@mailinator.com',
                    'mobile_no'    => '2230456702',
                    'usergroup_id' => 10
                ])
            );

            Userprofile::updateOrCreate(
                ['user_id' => $receptionist->id],
                [
                    'school_id'     => $receptionist->school_id,
                    'usergroup_id'  => $receptionist->usergroup_id,
                    'firstname'     => 'receptionist',
                    'lastname'      => 'receptionist',
                    'profession'    => 'others',
                    'address'       => 'Namakkal,Tamilnadu,India',
                    'country_id'    => 7,
                    'city_id'       => 31,
                    'state_id'      => 24,
                    'pincode'       => '625001'
                ]
            );

            if ($academicYear) {
                TeacherProfile::updateOrCreate(
                    [
                        'user_id'          => $receptionist->id,
                        'academic_year_id' => $academicYear->id
                    ],
                    [
                        'school_id'         => $receptionist->school_id,
                        'designation'       => 'receptionist',
                        'status'            => 1,
                    ]
                );
            }

            // Accountant
            $accountant = User::firstOrCreate(
                ['name' => 'accountant' . $school->id],
                array_merge(User::factory()->raw(), [
                    'school_id'    => $school->id,
                    'name'         => 'accountant' . $school->id,
                    'email'        => 'accountant' . $school->id . '@mailinator.com',
                    'mobile_no'    => '2230456703',
                    'usergroup_id' => 11
                ])
            );

            Userprofile::updateOrCreate(
                ['user_id' => $accountant->id],
                [
                    'school_id'     => $accountant->school_id,
                    'usergroup_id'  => $accountant->usergroup_id,
                    'firstname'     => 'accountant',
                    'lastname'      => 'accountant',
                    'profession'    => 'others',
                    'address'       => 'Namakkal,Tamilnadu,India',
                    'country_id'    => 7,
                    'city_id'       => 31,
                    'state_id'      => 24,
                    'pincode'       => '625001'
                ]
            );

            if ($academicYear) {
                TeacherProfile::updateOrCreate(
                    [
                        'user_id'          => $accountant->id,
                        'academic_year_id' => $academicYear->id
                    ],
                    [
                        'school_id'         => $accountant->school_id,
                        'designation'       => 'accountant',
                        'status'            => 1,
                    ]
                );
            }

            // Stock Keeper
            $stockKeeper = User::firstOrCreate(
                ['name' => 'stock_keeper' . $school->id],
                array_
