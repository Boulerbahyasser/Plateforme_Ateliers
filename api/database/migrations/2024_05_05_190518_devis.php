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
        Schema::create('devis', function (Blueprint $table) {
            $table->id('id_Devis');
            $table->unsignedBigInteger('id_Demande');
            $table->unsignedBigInteger('id_Fact')->nullable();
            $table->dateTime('Date');
            $table->decimal('Totale_HT', 10, 2);
            $table->decimal('Totale_TTC', 10, 2);
            $table->string('Statut');
            $table->text('Motif')->nullable();

            // Clés étrangères vers les tables parentes
            $table->foreign('id_Demande')->references('id_Demande')->on('demandes')->onDelete('cascade');
            $table->foreign('id_Fact')->references('id_Fact')->on('factures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
