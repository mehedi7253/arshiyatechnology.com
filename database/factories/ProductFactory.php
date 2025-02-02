<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name'           => $this->faker->word(),
            'slug'           => Str::slug($this->faker->word()) . '-' . rand(1, 1000),
            'sku'            => $this->faker->word() . '-' . rand(1, 1000),
            'thumbnail'      => '/demo/' . $this->faker->numberBetween(4, 5) . '.webp',
            'gallery'        => json_encode(['/demo/1.jpg', '/demo/2.jpg', '/demo/3.jpg']),
            'regular_price'  => $this->faker->randomFloat(2, 500, 1000),
            'discount_price' => $this->faker->randomFloat(2, 100, 400),
            'description'    => $this->faker->paragraph(),
            'is_stock'       => $this->faker->boolean(),
            'is_featured'    => $this->faker->boolean(),
            'is_active'      => $this->faker->boolean(),
            'is_trending'    => $this->faker->boolean(),
            'is_bestseller'  => $this->faker->boolean(),
            'is_offers'      => $this->faker->boolean(),
            'is_new'         => $this->faker->boolean(),
            'tags'           => 'test-product, test2, test3, test4, test5, test6',
        ];
    }
}
