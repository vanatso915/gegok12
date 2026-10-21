<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PayCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        $payCategories = [
            'Not Applicable',
            'User Defined',
            'On Attendance',
            'Computation',
            // 'Flat Rate', // Left commented out as in your original code
        ];

        foreach ($payCategories as $category) {
            DB::table('pay_categories')->updateOrInsert(
                ['name' => $category],
                [
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
