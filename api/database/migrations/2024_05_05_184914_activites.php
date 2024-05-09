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
        Schema::create('activites', function (Blueprint $table) {
            $table->id('id_Activite');
            $table->string('Titre');
            $table->string('IMAGE_PUB')->nullable();
            $table->text('Description');
            $table->string('Lien_Youtube')->nullable();
            $table->text('Objectifs');
            $table->string('Domaine');
            $table->timestamps();

            // Ajouter l'index sur le domaine pour optimisation des requêtes
            $table->index('Domaine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
