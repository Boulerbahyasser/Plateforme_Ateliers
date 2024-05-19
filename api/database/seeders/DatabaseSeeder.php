<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Administrateur;
use App\Models\Animateur;
use App\Models\Horaire;
use App\Models\Activite;
use App\Models\Offre;
use App\Models\Demande;
use App\Models\Enfant;
use App\Models\Father;
use App\Models\User;
use App\Models\Notification;
use App\Models\Facture;
use App\Models\Pack;
use App\Models\Devis;
use App\Models\ActiviteOffre;
use App\Models\DemandeInscription;
use App\Models\PlanningAnim;
use App\Models\PlanningEnf;
use App\Models\Hda;
use App\Models\HdAnim;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Administrateur::factory()->count(5)->create();

        Animateur::factory()->count(10)->create();

        Horaire::factory()->count(20)->create();

        Activite::factory()->count(15)->create();

        Offre::factory()->count(10)->create();

        Demande::factory()->count(8)->create();

        Enfant::factory()->count(30)->create();

        Father::factory()->count(15)->create();

        User::factory()->count(50)->create();

        Notification::factory()->count(15)->create();

        Facture::factory()->count(20)->create();

        Pack::factory()->count(10)->create();

        Devis::factory()->count(20)->create();

        ActiviteOffre::factory()->count(15)->create();

        DemandeInscription::factory()->count(30)->create();

        PlanningAnim::factory()->count(25)->create();

        PlanningEnf::factory()->count(35)->create();

        Hda::factory()->count(40)->create();

        HdAnim::factory()->count(40)->create();
    }
}
