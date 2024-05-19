<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activite_offres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offre_id');
            $table->unsignedBigInteger('activite_id');
            $table->decimal('tarif', 10, 2);
            $table->decimal('tarif_remise', 10, 2); //le nv tarif en appliquant la remise de l'offre
            $table->integer('age_min');
            $table->integer('age_max');
            $table->integer('nbr_seance');
            $table->integer('volume_horaire');
            $table->string('option_paiement');

            // Clés étrangères vers les tables parentes
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
            $table->foreign('activite_id')->references('id')->on('activites')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activite_offres');
    }
};
