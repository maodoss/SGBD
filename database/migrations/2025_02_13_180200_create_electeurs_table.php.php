<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('electeurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fichier_electoral_id')->constrained('fichier_electorals')->nullable();
            $table->string('cin')->unique(); 
            $table->bigInteger('num_electeur')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->enum('sexe', ['Masculin', 'Feminin']);
            $table->string('bureau_vote');
            $table->string('email')->unique()->nullable();
            $table->boolean('aVote')->default(false);       
            $table->boolean('aUnCompte')->default(false);    
            $table->string('telephone')->unique()->nullable();
            $table->string('code_auth')->nullable();
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('electeurs');
    }
};