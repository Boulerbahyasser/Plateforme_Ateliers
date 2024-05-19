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
            $table->id();
            $table->unsignedBigInteger('father_id');

            // Clé étrangère vers la table 'parents'
            $table->foreign('father_id')->references('id')->on('fathers')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('niveau')->nullable();
            $table->string('photo')->nullable();
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
