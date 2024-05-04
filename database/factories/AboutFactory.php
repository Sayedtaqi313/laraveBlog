<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
 
    public function definition()
    {
        return [
            "who_are_we" => fake()->text(200),
            "our_mission" => fake()->text(150),
            "our_vision" => fake()->text(150),
            "our_service" => fake()->text(200),
            "about_our_site" => fake()->text(200),
            "imageOne" => fake()->imageUrl(),
            "imageTwo" => fake()->imageUrl()
        ];
    }
}
