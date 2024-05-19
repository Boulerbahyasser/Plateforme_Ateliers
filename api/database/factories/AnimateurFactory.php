<?php

namespace Database\Factories;

use App\Models\Animateur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimateurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Animateur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'domaine' => $this->faker->word,
            'user_id' => User::factory()->create()->id,
        ];
    }
}


