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
        Schema::create('hda', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Activite_Offre');
            $table->unsignedBigInteger('id_Horaire');
            $table->integer('Eff_Min');
            $table->integer('Eff_Max');
            $table->integer('Nbr_Place_Restant');
            $table->timestamps();
            // Clé primaire composite
            $table->primary(['id_Activite_Offre', 'id_Horaire']);

            // Clés étrangères vers les tables parentes
            $table->foreign('id_Activite_Offre')->references('id_Activite_Offre')->on('activite_offres')->onDelete('cascade');
            $table->foreign('id_Horaire')->references('id_Horaire')->on('horaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hda');
    }
};
