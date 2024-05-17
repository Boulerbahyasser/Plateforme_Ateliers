<?php

namespace Database\Factories;

use App\Models\PlanningEnf;
use App\Models\Enfant;
use App\Models\Activite;
use App\Models\Horaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanningEnfFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlanningEnf::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'enfant_id' => Enfant::factory()->create()->id,
            'activite_id' => Activite::factory()->create()->id,
            'horaire_id' => Horaire::factory()->create()->id,
        ];
    }
}
