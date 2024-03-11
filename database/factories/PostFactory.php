<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(2,true);
        return [
            //
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->sentence(3),
            'body' => fake()->sentence(5),
            'user_id' => fake()->numberBetween(1,3),
            'cate_id' => fake()->numberBetween(1,3),
        ];
    }
}
