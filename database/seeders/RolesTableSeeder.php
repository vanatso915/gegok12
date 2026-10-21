<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        $roles = [
            [
                'id'           => 1,
                'name'         => 'leave_applier',
                'display_name' => 'Leave Applier',
                'description'  => 'Leave Applier',
            ],
            [
                'id'           => 2,
                'name'         => 'leave_checker',
                'display_name' => 'Leave Checker',
                'description'  => 'Leave Checker',
            ],
            [
                'id'           => 3,
                'name'         => 'principal',
                'display_name' => 'Principal',
                'description'  => 'Principal',
            ],
            [
                'id'           => 4,
                'name'         => 'student_leave_checker',
                'display_name' => 'Student Leave Checker',
                'description'  => 'Student Leave Checker',
            ],
            [
                'id'           => 5,
                'name'         => 'class_coordinator',
                'display_name' => 'Class Coordinator',
                'description'  => 'Class Coordinator',
            ],
            [
                'id'           => 6,
                'name'         => 'transport_coordinator',
                'display_name' => 'Transport Coordinator',
                'description'  => 'Transport Coordinator',
            ],
            [
                'id'           => 7,
                'name'         => 'transport_driver',
                'display_name' => 'Transport Driver',
                'description'  => 'Transport Driver',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['id' => $role['id']], // Unique lookup key
                [
                    'name'         => $role['name'],
                    'display_name' => $role['display_name'],
                    'description'  => $role['description'],
                    'created_at'   => $now,
                    'updated_at'   => $now,
                ]
            );
        }
    }
}
