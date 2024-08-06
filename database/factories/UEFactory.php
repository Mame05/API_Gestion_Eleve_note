<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UE>
 */
class UEFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $libelles = [
            'UE1','UE2','UE3'
        ];
        return [
            'libelle' => $this->faker->randomElement($libelles),
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'coeff' =>$this->faker->numberBetween(1, 15),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
