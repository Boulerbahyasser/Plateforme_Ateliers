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
            $table->id('id_Activite_Offre');
            $table->unsignedBigInteger('id_Offre');
            $table->unsignedBigInteger('id_Activite');
            $table->decimal('Tarif', 10, 2);
            $table->integer('Age_Min');
            $table->integer('Age_Max');
            $table->integer('Nbr_Seance');
            $table->integer('Volume_Horaire');
            $table->string('Option_Paiement');
            $table->timestamps();
            // Clés étrangères vers les tables parentes
            $table->foreign('id_Offre')->references('id_offre')->on('offres')->onDelete('cascade');
            $table->foreign('id_Activite')->references('id_Activite')->on('activites')->onDelete('cascade');
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
