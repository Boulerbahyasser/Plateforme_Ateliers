<?php

namespace Database\Factories;

use App\Models\DemandeInscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandeInscriptionFactory extends Factory
{
    protected $model = DemandeInscription::class;

    public function definition(): array
    {
        return [
            'enfant_id' => \App\Models\Enfant::factory(),
            'activite_offre_id' => \App\Models\ActiviteOffre::factory(),
            'demande_id' => \App\Models\Demande::factory(),
            'horaire1' => $this->faker->dateTime,
            'horaire2' => $this->faker->dateTime,
            'etat' => $this->faker->randomElement(['en cours', 'accepte', 'refuse']),
            'motif' => $this->faker->paragraph,
        ];
    }
}

