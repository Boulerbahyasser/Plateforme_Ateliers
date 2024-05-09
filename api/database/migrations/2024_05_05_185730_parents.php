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
        Schema::create('parents', function (Blueprint $table) {
            $table->id('id_Parent');
            $table->unsignedBigInteger('id_User');

            // Clé étrangère vers la table 'users'
            $table->foreign('id_User')->references('id_User')->on('utilisateurs')->onDelete('cascade');

            $table->string('Fonction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
