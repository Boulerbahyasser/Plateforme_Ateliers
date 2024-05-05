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
        Schema::create('packs', function (Blueprint $table) {
            $table->id('id_Pack');
            $table->unsignedBigInteger('id_Demande');
            $table->string('Nom');
            $table->decimal('Remise', 10, 2);

            // Clé étrangère vers la table 'demandes'
            $table->foreign('id_Demande')->references('id_Demande')->on('demandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packs');
    }
};
