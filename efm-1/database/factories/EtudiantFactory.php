<?php

namespace Database\Factories;

use App\Models\Etudiant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Etudiant>
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
            "nom"=> fake()->name(),
            "email" =>fake()->email(),
            "niveau"=>fake()->slug() , 
            "filiere"=>fake()->slug(),
            "date_naissance"=>fake()->date(),
        ];
    }
}
