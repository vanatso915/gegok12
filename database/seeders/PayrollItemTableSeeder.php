<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PayrollItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        $payrollItems = [
            [
                'name' => 'Basic Salary',
                'key'  => 'BA',
                'type' => 'defined',
            ],
            [
                'name' => 'Addition Allowance',
                'key'  => 'AA',
                'type' => 'earning',
            ],
            [
                'name' => 'Deduction',
                'key'  => 'DN',
                'type' => 'deduction',
            ],
            [
                'name' => 'Employees State Insurance',
                'key'  => 'ESI',
                'type' => 'deduction',
            ],
            [
                'name' => 'Provident Fund',
                'key'  => 'PF',
                'type' => 'deduction',
            ],
            [
                'name' => 'Income tax',
                'key'  => 'IT',
                'type' => 'deduction',
            ],
        ];

        foreach ($payrollItems as $item) {
            DB::table('payroll_items')->updateOrInsert(
                ['key' => $item['key']], // Unique lookup key
                [
                    'name'       => $item['name'],
                    'type'       => $item['type'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
