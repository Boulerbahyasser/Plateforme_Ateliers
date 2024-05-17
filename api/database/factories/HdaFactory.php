<?php

namespace Database\Factories;

use App\Models\Hda;
use App\Models\ActiviteOffre;
use App\Models\Horaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class HdaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hda::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'activite_offre_id' => ActiviteOffre::factory()->create()->id,
            'horaire_id' => Horaire::factory()->create()->id,
            'eff_min' => $this->faker->numberBetween(1, 10),
            'eff_max' => $this->faker->numberBetween(5, 20),
            'nbr_place_restant' => $this->faker->numberBetween(1, 10),
        ];
    }
}


