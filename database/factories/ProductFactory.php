<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2, $asText = true);
        $slug = Str::slug($product_name);
        return [
            'name' => $product_name,
            'slug' => $slug,
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(500),
            'regular_price' => $this->faker->numberBetween(10, 500),
            'ISBN_13' => 'ISBN-13'.$this->faker->unique()->text(14), //nwely added
            'Author' => $this->faker->text(100), //nwely added
            'Publisher' => $this->faker->text(50), //nwely added
            'Language' => $this->faker->text(20), //nwely added
            'Pages' => $this->faker->text(10), //nwely added
            'Published-Year' => $this->faker->text(5), //nwely added
            'stock_status' => 'instock',
            'quantity' => $this->faker->numberBetween(100, 200),
            'image' => 'digital_' . $this->faker->unique()->numberBetween(1, 22) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
