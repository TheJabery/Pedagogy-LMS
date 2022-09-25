<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'current_session', 'value' => '2021-2022'],
            ['key' => 'school_title', 'value' => 'AS'],
            ['key' => 'school_name', 'value' => 'Apex International Schools'],
            ['key' => 'end_first_term', 'value' => '01-12-2022'],
            ['key' => 'end_second_term', 'value' => '01-03-2023'],
            ['key' => 'phone', 'value' => '777710811'],
            ['key' => 'address', 'value' => 'القاهرة'],
            ['key' => 'school_email', 'value' => 'man561350@gmail.com'],
            ['key' => 'logo', 'value' => '1.jpg'],
        ];

        DB::table('settings')->insert($data);
    }
}
