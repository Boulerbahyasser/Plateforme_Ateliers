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
        Schema::create('demande_inscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Enfant');
            $table->unsignedBigInteger('id_Activite_Offre');
            $table->unsignedBigInteger('id_Demande');
            $table->dateTime('Horaire1');
            $table->dateTime('Horaire2');
            $table->string('Etat');
            $table->text('Motif');

            // Clé primaire composite
            $table->primary(['id_Enfant', 'id_Activite_Offre', 'id_Demande']);

            // Clés étrangères vers les tables parentes
            $table->foreign('id_Enfant')->references('id_Enfant')->on('enfants')->onDelete('cascade');
            $table->foreign('id_Activite_Offre')->references('id_Activite_Offre')->on('activite_offres')->onDelete('cascade');
            $table->foreign('id_Demande')->references('id_Demande')->on('demandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_inscriptions');
    }
};
