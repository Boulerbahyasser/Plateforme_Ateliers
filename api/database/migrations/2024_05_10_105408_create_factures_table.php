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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date de la facture
            $table->decimal('total_ht', 8, 2); // Total HT (8 chiffres au total, 2 décimales)
            $table->decimal('total_ttc', 8, 2); // Total TTC (8 chiffres au total, 2 décimales)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
