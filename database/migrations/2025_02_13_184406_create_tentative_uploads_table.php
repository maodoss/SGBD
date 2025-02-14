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
        Schema::create('tentative_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fichier');
            $table->foreignId('user_dge_id')->constrained('utilisateur_dges');
            $table->string('path');
            $table->string('checksum_utilise');
            $table->string('ip_address')->nullable();
            $table->boolean('is_valid')->default(false);
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentative_uploads');
    }
};
