<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        $schools = [
            [
                'id'         => 1,
                'name'       => 'Demo School',
                'email'      => 'demoschool@gegok12.com',
                'phone'      => '9500979461',
                'status'     => '1',
                'slug'       => 'demo-school',
            ],
            /*
            [
                'id'         => 2,
                'name'       => 'Model School Two',
                'email'      => 'modelschool2@gegok12.com',
                'phone'      => '8999911112',
                'status'     => '1',
                'slug'       => 'model-school-two',
            ],
            */
        ];

        foreach ($schools as $school) {
            DB::table('schools')->updateOrInsert(
                ['id' => $school['id']], // Match condition by primary key
                [
                    'name'       => $school['name'],
                    'email'      => $school['email'],
                    'phone'      => $school['phone'],
                    'status'     => $school['status'],
                    'slug'       => $school['slug'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
