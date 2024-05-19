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
        Schema::create('hdas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activite_offre_id');
            $table->unsignedBigInteger('horaire_id');
            $table->integer('eff_min');
            $table->integer('eff_max');
            $table->integer('nbr_place_restant');


            // Clés étrangères vers les tables parentes
            $table->foreign('activite_offre_id')->references('id')->on('activite_offres')->onDelete('cascade');
            $table->foreign('horaire_id')->references('id')->on('horaires')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hdas');
    }
};
