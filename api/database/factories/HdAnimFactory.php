<?php

namespace Database\Factories;

use App\Models\HdAnim;
use App\Models\Animateur;
use App\Models\Activite;
use App\Models\Horaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class HdAnimFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HdAnim::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'anim_id' => Animateur::factory()->create()->id,
            'horaire_id' => Horaire::factory()->create()->id,
        ];
    }
}
