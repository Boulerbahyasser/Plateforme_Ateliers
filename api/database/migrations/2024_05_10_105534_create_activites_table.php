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
            $table->id();
            $table->string('titre');
            $table->string('image_pub')->nullable();
            $table->text('description');
            $table->string('lien_youtube')->nullable();
            $table->text('objectifs');
            $table->string('domaine');

            // Ajouter l'index sur le domaine pour optimisation des requêtes
            $table->index('domaine');
            $table->timestamps();
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
