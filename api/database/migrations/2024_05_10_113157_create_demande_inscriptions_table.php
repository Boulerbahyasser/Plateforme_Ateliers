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
            $table->id();
            $table->unsignedBigInteger('enfant_id');
            $table->unsignedBigInteger('activite_offre_id');
            $table->unsignedBigInteger('demande_id');
            $table->string('horaire1');
            $table->string('horaire2');
            $table->string('etat');
            $table->text('motif');


            // Clés étrangères vers les tables parentes
            $table->foreign('enfant_id')->references('id')->on('enfants')->onDelete('cascade');
            $table->foreign('activite_offre_id')->references('id')->on('activite_offres')->onDelete('cascade');
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');

            $table->timestamps();
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
