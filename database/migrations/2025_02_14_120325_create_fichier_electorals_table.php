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
        Schema::create('fichier_electorals', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fichier');
            $table->string('path'); // Chemin du fichier
            $table->string('checksum');
            $table->timestamp('date_upload')->useCurrent();
            $table->boolean('est_valide')->default(false);
            //$table->foreignId('user_dge_id')->constrained('utilisateur_dges');
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichier_electorals');
    }
};
