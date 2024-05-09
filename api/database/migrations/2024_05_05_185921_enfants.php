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
        Schema::create('enfants', function (Blueprint $table) {
            $table->id('id_Enfant');
            $table->unsignedBigInteger('id_Parent');

            // Clé étrangère vers la table 'parents'
            $table->foreign('id_Parent')->references('id_Parent')->on('parents')->onDelete('cascade');
            $table->string('Nom')->nullable();
            $table->string('Prenom')->nullable();
            $table->date('Date_Naissance')->nullable();
            $table->string('Niveau')->nullable();
            $table->string('Photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enfants');
    }
};
