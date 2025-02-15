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
        Schema::create('electeurs_temps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fichier_electoral_id')->constrained('fichier_electorals');
            $table->foreignId('tentative_upload_id')->constrained('tentative_uploads');
            $table->string('cin');
            $table->integer('num_electeur');
            $table->text('nature_probleme')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electeurs_temps');
    }
};
