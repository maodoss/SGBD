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
        Schema::create('electeurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fichier_electoral_id')->constrained('fichier_electoraux'); // Fichier source
            $table->string('cin')->unique(); // CIN de l'électeur
            $table->integer('num_electeur')->unique(); // Numéro d'électeur
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->enum('sexe', ['Masculin', 'Feminin']);
            $table->string('bureau_vote');
            $table->string('code_auth')->nullable(); // Code d'authentification
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electeurs');
    }
};
