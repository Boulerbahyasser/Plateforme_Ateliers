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
        Schema::create('offres', function (Blueprint $table) {
            $table->id('id_offre');
            $table->unsignedBigInteger('id_Admin');
            $table->string('Titre');
            $table->date('Date_Creation');
            $table->date('Date_Fin');
            $table->text('Description');
            $table->decimal('Remise', 10, 2);

            // Clé étrangère vers la table 'administrateurs'
            $table->foreign('id_Admin')->references('id_Admin')->on('administrateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
