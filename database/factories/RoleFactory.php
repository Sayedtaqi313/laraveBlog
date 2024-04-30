<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
  
    public  $number = 0;
    public function definition()
    {
        return [
            //
            'name' => "admin"
        ];
    }
}
