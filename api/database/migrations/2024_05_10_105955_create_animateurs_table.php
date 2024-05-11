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
            $table->id();
            $table->string('domaine');
            $table->unsignedBigInteger('user_id')->nullable(false);

            // Clé étrangère vers la table 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Ajout d'index pour l'optimisation des requêtes
            $table->index('user_id');
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
