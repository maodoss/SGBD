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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('electeur_id')
                ->constrained('electeurs')
                ->unique();
    
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->string('code_auth')->unique()->comment('Code de sécurité envoyé par email/SMS');
    
            $table->string('nom_parti')->nullable();
            $table->string('slogan')->nullable();
            $table->string('photo')->nullable();
            $table->string('couleur_parti')->nullable();
            $table->string('uri_page')->nullable();
    
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
