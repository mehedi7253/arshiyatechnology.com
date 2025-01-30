<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = ['1.jpg', '2.jpg', '3.jpg', '4.jpg'];
        foreach ($banners as $key => $banner) {
            \App\Models\Banner::create([
                'banner_image' => '/demo/banner/' . $banner,
                'banner_link' => '#',
                'status' => 0,
            ]);
        }
    }
}
