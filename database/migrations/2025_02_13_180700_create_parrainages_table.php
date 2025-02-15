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
        Schema::create('parrainages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('electeur_id')->constrained('electeurs')->unique();
            $table->foreignId('candidat_id')->constrained('candidats');
            $table->foreignId('periode_id')->constrained('periode_parrainages');
            $table->dateTime('date_parrainage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parrainages');
    }
};