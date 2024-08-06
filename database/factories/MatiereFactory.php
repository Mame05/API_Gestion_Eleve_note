<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $libelles = [
           'Math','PC','SVT','Histoire','Géographie','Français','philo'
        ];
        // Générer une date de début
        $dateDebut = $this->faker->dateTimeBetween('-1 year', 'now');

        // Générer une date de fin après la date de début
        $dateFin = $this->faker->dateTimeBetween($dateDebut, '+1 year');
        return [
            'libelle' => $this->faker->randomElement($libelles), // Choisir un libellé aléatoire dans le tableau
            'date_debut' => $dateDebut->format('Y-m-d'),          // Format de date
            'date_fin' => $dateFin->format('Y-m-d'),              // Format de date
            'u_e_id' => $this->faker->numberBetween(1, 3),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
