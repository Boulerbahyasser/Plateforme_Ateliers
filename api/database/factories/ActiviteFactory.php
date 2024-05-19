<?php

namespace Database\Factories;

use App\Models\Activite;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActiviteFactory extends Factory
{
    protected $model = Activite::class;

    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence,
            'image_pub' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'lien_youtube' => $this->faker->url,
            'objectifs' => $this->faker->text,
            'domaine' => $this->faker->word,
        ];
    }
}
