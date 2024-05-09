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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id_Notif');
            $table->unsignedBigInteger('id_User');

            // Clé étrangère vers la table 'utilisateurs'
            $table->foreign('id_User')->references('id_User')->on('utilisateurs')->onDelete('cascade');

            $table->date('Date');
            $table->text('Contenu');
            $table->string('Object');
            $table->string('Type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
