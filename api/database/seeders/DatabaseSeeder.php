<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\Facture::factory(40)->create();
         \App\Models\Activite::factory(40)->create();
         \App\Models\Horaire::factory(40)->create();
         \App\Models\Animateur::factory(40)->create();
         \App\Models\Administrateur::factory(40)->create();
         \App\Models\Notification::factory(40)->create();
         \App\Models\Father::factory(40)->create();
         \App\Models\Enfant::factory(40)->create();
         \App\Models\Demande::factory(40)->create();
         \App\Models\Offre::factory(40)->create();
         \App\Models\Activite::factory(40)->create();
         \App\Models\Pack::factory(40)->create();
         \App\Models\Devis::factory(40)->create();
         \App\Models\DemandeInscription::factory(40)->create();
         \App\Models\Hda::factory(40)->create();
         \App\Models\HdAnim::factory(40)->create();
         \App\Models\PlanningAnim::factory(40)->create();
         \App\Models\PlanningEnf::factory(40)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
