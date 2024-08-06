<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'prenom' => $this->faker->firstName,                // Prénom aléatoire
            'nom' => $this->faker->lastName,                    // Nom de famille aléatoire
            'adresse' => $this->faker->address,                  // Adresse aléatoire
            'telephone' => $this->faker->phoneNumber,            // Numéro de téléphone aléatoire
            'matricule' => $this->faker->unique()->word,          // Matricule unique
            'date_naissance' => $this->faker->date('Y-m-d', '2000-01-01'), // Date de naissance aléatoire, par exemple, avant 2000
            'email' => $this->faker->unique()->safeEmail,        // Email unique
            'mot_de_passe' => bcrypt('password'),                 // Mot de passe haché par défaut
            'photo' => $this->faker->imageUrl(640, 480, 'people'), // URL d'image aléatoire
        ];
    }
}
