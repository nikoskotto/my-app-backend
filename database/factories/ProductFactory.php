<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray();
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            'image' => $this->faker->imageUrl(),
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}
