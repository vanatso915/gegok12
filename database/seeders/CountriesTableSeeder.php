<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'Afghanistan', 'short_name' => 'AF', 'iso_code' => 'AFG', 'tel_prefix' => '93', 'status' => '0'],
            ['name' => 'Albania', 'short_name' => 'AL', 'iso_code' => 'ALB', 'tel_prefix' => '355', 'status' => '0'],
            ['name' => 'Argentina', 'short_name' => 'AR', 'iso_code' => 'ARG', 'tel_prefix' => '54', 'status' => '0'],
            ['name' => 'Australia', 'short_name' => 'AU', 'iso_code' => 'AUS', 'tel_prefix' => '61', 'status' => '0'],
            ['name' => 'China', 'short_name' => 'CH', 'iso_code' => 'CHN', 'tel_prefix' => '86', 'status' => '0'],
            ['name' => 'Egypt', 'short_name' => 'EG', 'iso_code' => 'EGY', 'tel_prefix' => '20', 'status' => '0'],
            ['name' => 'India', 'short_name' => 'IN', 'iso_code' => 'IND', 'tel_prefix' => '91', 'status' => '1'],
            ['name' => 'Malaysia', 'short_name' => 'MA', 'iso_code' => 'MYS', 'tel_prefix' => '60', 'status' => '0'],
            ['name' => 'Switzerland', 'short_name' => 'SW', 'iso_code' => 'CHE', 'tel_prefix' => '41', 'status' => '0'],
        ];

        $now = date("Y-m-d H:i:s");

        foreach ($countries as $country) {
            DB::table('countries')->updateOrInsert(
                ['short_name' => $country['short_name']], // Match by unique short name
                [
                    'name' => $country['name'],
                    'iso_code' => $country['iso_code'],
                    'tel_prefix' => $country['tel_prefix'],
                    'status' => $country['status'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
        }
    }
}
