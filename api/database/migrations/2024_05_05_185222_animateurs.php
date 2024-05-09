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
        Schema::create('animateurs', function (Blueprint $table) {
            $table->id('id_Anim');
            $table->string('Domaine');
            $table->unsignedBigInteger('id_User')->nullable(false);

            // Clé étrangère vers la table 'users'
            $table->foreign('id_User')->references('id_User')->on('utilisateurs')->onDelete('cascade');

            // Ajout d'index pour l'optimisation des requêtes
            $table->index('id_User');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animateurs');
    }
};
