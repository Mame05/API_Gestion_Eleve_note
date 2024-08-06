<?php

namespace Database\Seeders;

use App\Models\User;
use App\Policies\EvaluationPolicy;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            UESeeder::class,
            MatiereSeeder::class,
            EtudiantSeeder::class,
            EvaluationSeeder::class
        ]);
    }
}
