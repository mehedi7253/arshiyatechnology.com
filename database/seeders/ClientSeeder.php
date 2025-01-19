<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 36; $i++) {
            DB::table('clients')->insert([
                'client_logo' => '/uploads/clients/'.$i.'.'.'jpg',
                'url'         => 'https://arshiyatechnology.com/',
                'created_at'  => now(),
                'updated_at'  => now()
            ]);
        }
    }
}

