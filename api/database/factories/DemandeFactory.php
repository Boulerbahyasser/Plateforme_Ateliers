<?php

namespace Database\Factories;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeFactory extends Factory
{
    protected $model = Demande::class;

    public function definition(): array
    {
        return [
            'pack_id' => \App\Models\Pack::factory(),
            'admin_id' => \App\Models\Administrateur::factory(),
            'date' => $this->faker->dateTime,
            'statut' => $this->faker->randomElement(['brouillon', 'valide']),
        ];
    }
}

