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
        Schema::create('planning_enfs', function (Blueprint $table) {
            $table->id();
            // Clés étrangères
            $table->unsignedBigInteger('enfant_id');
            $table->unsignedBigInteger('activite_id');
            $table->unsignedBigInteger('horaire_id');


            // Clés étrangères vers les tables parentes
            $table->foreign('enfant_id')->references('id')->on('enfants')->onDelete('cascade');
            $table->foreign('activite_id')->references('id')->on('activites')->onDelete('cascade');
            $table->foreign('horaire_id')->references('id')->on('horaires')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planning_enfs');
    }
};
