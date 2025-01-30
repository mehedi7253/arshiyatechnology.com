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
                'name' => 'Arshiya Technology',
                'email' => 'info@arshiyatechnology.com',
                'phone' => '010xxxxxxx',
                'logo'  => 'demo/setting/logo.png',
                'favicon'  => 'demo/setting/icon.png',
                'created_at' => now()
            ]
        ]);
    }
}
