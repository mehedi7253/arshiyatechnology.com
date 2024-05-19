<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionVissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mission_vissions')->insert([
            [
                'mission' => 'The Click of Confidence Customer reliability is our main assets. We want make our Customer happy with confidence.',
                'vision' => 'To achieve customer satisfaction, confidence by providing premium quality products and professional service on time in the most cost effective and environment friendly manner.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
