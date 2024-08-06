<?php

namespace Database\Factories;

use App\Models\Matiere;
use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'note' => $this->faker->numberBetween(0, 20), // Exemple de note entre 0 et 20
            'etudiant_id' => Etudiant::factory(), // Crée un étudiant factice
            'matiere_id' => Matiere::factory(), // Crée une matière factice
        ];
    }
}
