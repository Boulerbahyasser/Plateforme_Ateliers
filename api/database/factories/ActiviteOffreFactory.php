<?php

namespace Database\Factories;

use App\Models\ActiviteOffre;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActiviteOffreFactory extends Factory
{
    protected $model = ActiviteOffre::class;

    public function definition(): array
    {
        return [
            'offre_id' => \App\Models\Offre::factory(),
            'activite_id' => \App\Models\Activite::factory(),
            'tarif' => $this->faker->randomFloat(2, 100, 1000),
            'tarif_remise' => $this->faker->randomFloat(2, 50, 900),
            'age_min' => $this->faker->numberBetween(3, 5),
            'age_max' => $this->faker->numberBetween(10, 15),
            'nbr_seance' => $this->faker->numberBetween(1, 10),
            'volume_horaire' => $this->faker->numberBetween(10, 100),
            'option_paiement' => $this->faker->word,
        ];
    }
}


