<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'parent_id' => null,
                'category_name' => 'Printing Solution',
                'slug' => 'printing-solution',
                'status' => 'active',
            ],
            [
                'parent_id' => null,
                'category_name' => 'Photocopy Solutions',
                'slug' => 'photocopy-solutions',
                'status' => 'active',
            ],
            [
                'parent_id' => null,
                'category_name' => 'Scanner Solutions',
                'slug' => 'scanner-solutions',
                'status' => 'active',
            ],
            [
                'parent_id' => 1,
                'category_name' => 'Printers',
                'slug' => 'printers',
                'status' => 'active',
            ],
            [
                'parent_id' => 1,
                'category_name' => 'Toner Cartridges',
                'slug' => 'toner-cartridges',
                'status' => 'active',
            ],[
                'parent_id' => 2,
                'category_name' => 'Accessories',
                'slug' => 'accessories',
                'status' => 'active',
            ],
            [
                'parent_id' => 2,
                'category_name' => 'Scanners',
                'slug' => 'scanners',
                'status' => 'active',
            ],

        ];

        foreach ($categories as $key => $category) {
            Category::create($category);
        }
    }
}
