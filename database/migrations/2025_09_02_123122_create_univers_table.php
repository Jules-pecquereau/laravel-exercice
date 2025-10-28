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
        Schema::create('univers', function (Blueprint $table) {
            $table->id();
            $table->string('nom' , 30);
            $table->text('description');
            $table->string("lien_vers_l'image");
            $table->string("lien_vers_le_logo");
            $table->string('couleur_principale' , 7);
            $table->string('couleur_secondaire' , 7);
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('univers');

    }
};
