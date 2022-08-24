<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MitarbeiterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "firmen_id"=>fake()->numberBetween($min=1,$max=10),
            "vorname"=>fake()->firstName(20),
            "nachname"=>fake()->LastName(20),
            "email" => fake()->unique()->safeEmail(),
        ];
    }
}
