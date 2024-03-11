<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public  $count = 0;
    public function definition()
    {
        $roleName = ['admin','author','user'];
        return [
            //
            'name' => $roleName[fake()->numberBetween(0,2)],
        ];
    }
}
