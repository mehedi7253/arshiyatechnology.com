<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus =[
        [
            'name' => 'Home',
            'url' => '/',
            'icon' => 'fas fa-home',
            'parent_id' => null,
            'order' => 1,
            'is_active' => 1,
            'is_open_new_tab' => 0,
            'created_at' => now(),
        ],[
            'name' => 'About Us',
            'url' => '/about-us',
            'icon' => 'fas fa-info-circle',
            'parent_id' => null,
            'order' => 2,
            'is_active' => 1,
            'is_open_new_tab' => 0,
            'created_at' => now(),
        ],[
            'name' => 'Shop',
            'url' => '/shop',
            'icon' => 'fas fa-wrench',
            'parent_id' => null,
            'order' => 3,
            'is_active' => 1,
            'is_open_new_tab' => 0,
            'created_at' => now(),
        ],[
            'name' => 'Contact Us',
            'url' => '/contact-us',
            'icon' => 'fas fa-address-book',
            'parent_id' => null,
            'order' => 4,
            'is_active' => 1,
            'is_open_new_tab' => 0,
            'created_at' => now(),
        ],[
            'name' => 'Special Offer',
            'url' => '/special-offer',
            'icon' => 'fas fa-shopping-bag',
            'parent_id' => null,
            'order' => 5,
            'is_active' => 1,
            'is_open_new_tab' => 0,
            'created_at' => now(),
        ]
        ];

        foreach ($menus as $key => $menu) {
            Menu::create($menu);
        }
    }
}
