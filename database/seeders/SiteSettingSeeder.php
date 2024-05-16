<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([
            [
                'name' => 'Site name',
                'email' => 'site@example.com',
                'phone' => '010xxxxxxx',
                'logo'  => 'uploads/images/logo.png',
                'favicon'  => 'uploads/images/favicon.png',
                'created_at' => now()
            ]
        ]);
    }
}
