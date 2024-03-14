<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = ['blog-1.jpg','blog-2.jpg','blog-3.jpg','blog-4.jpg'];
        return [
            //
            'name' => fake()->word(),
            'extension' => 'jpg',
            'path' => 'images/' . fake()->randomElement($images)
        ];
    }
}
