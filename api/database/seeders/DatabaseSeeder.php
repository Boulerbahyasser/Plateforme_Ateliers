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
        Administrateur::factory()->count(2)->create();

        Animateur::factory()->count(4)->create();

        Horaire::factory()->count(8)->create();

        Activite::factory()->count(5)->create();

        Offre::factory()->count(4)->create();

        Demande::factory()->count(2)->create();

        Enfant::factory()->count(10)->create();

        Father::factory()->count(8)->create();

        //User::factory()->count(50)->create();

        Notification::factory()->count(8)->create();

        Facture::factory()->count(9)->create();

        Pack::factory()->count(4)->create();

        Devis::factory()->count(7)->create();

        ActiviteOffre::factory()->count(6)->create();

        DemandeInscription::factory()->count(10)->create();

        PlanningAnim::factory()->count(8)->create();

        PlanningEnf::factory()->count(11)->create();

        Hda::factory()->count(13)->create();

        HdAnim::factory()->count(14)->create();
    }
}
