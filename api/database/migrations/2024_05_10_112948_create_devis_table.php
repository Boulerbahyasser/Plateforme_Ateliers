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
            $table->id();
            $table->unsignedBigInteger('demande_id');
            $table->unsignedBigInteger('facture_id')->nullable();
            $table->dateTime('date');
            $table->decimal('totale_ht', 10, 2);
            $table->decimal('totale_ttc', 10, 2);
            $table->string('statut');
            $table->text('pdf'); // Chemin du fichier PDF
            $table->string('etat'); // Etat (payé, non payé)
            $table->text('motif')->nullable();

            // Clés étrangères vers les tables parentes
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');

            $table->timestamps();
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
