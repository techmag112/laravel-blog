<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::query()->inRandomOrder()->where('role_id', 3)->value('id'),
            //'user_id' => User::factory(),
          //   'category_id' => Category::query()->inRandomOrder()->value('id'),
            //'category_id' => Category::factory(),
            'title' => ucfirst(fake()->text(20)),
            'body' => ucfirst(fake()->text(200)),
            'cover' => fake()->imageUrl($width=100, $height=100),
            'image' => fake()->imageUrl($width=400, $height=400),
        ];
    }
}
