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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id('id_Demande');
            $table->unsignedBigInteger('id_Admin');
            $table->dateTime('Date');
            $table->string('Statut');

            // Clé étrangère vers la table 'administrateurs'
            $table->foreign('id_Admin')->references('id_Admin')->on('administrateurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
