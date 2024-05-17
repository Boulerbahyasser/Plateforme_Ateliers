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
        Schema::create('hd_anims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anim_id');
            $table->unsignedBigInteger('horaire_id');


            // Clés étrangères vers les tables parentes
            $table->foreign('anim_id')->references('id')->on('animateurs')->onDelete('cascade');
            $table->foreign('horaire_id')->references('id')->on('horaires')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hd_anims');
    }
};
