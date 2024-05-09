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
        Schema::create('hd_anim', function (Blueprint $table) {
            // Clés étrangères
            $table->unsignedBigInteger('id_Anim');
            $table->unsignedBigInteger('id_Horaire');
            $table->timestamps();
            // Clé primaire composite
            $table->primary(['id_Anim', 'id_Horaire']);

            // Clés étrangères vers les tables parentes
            $table->foreign('id_Anim')->references('id_Anim')->on('animateurs')->onDelete('cascade');
            $table->foreign('id_Horaire')->references('id_Horaire')->on('horaires')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hd_anim');
    }
};
