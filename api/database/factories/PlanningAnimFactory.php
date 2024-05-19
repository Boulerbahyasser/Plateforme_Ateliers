<?php

namespace Database\Factories;

use App\Models\PlanningAnim;
use App\Models\Activite;
use App\Models\Horaire;
use App\Models\Animateur;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanningAnimFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PlanningAnim::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'anim_id' => Animateur::factory()->create()->id,
            'activite_id' => Activite::factory()->create()->id,
            'horaire_id' => Horaire::factory()->create()->id,
        ];
    }
}
