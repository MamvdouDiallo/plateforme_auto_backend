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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string("type_transmission")->nullable();
            $table->string("etat")->nullable();
            $table->string("type_carburant")->nullable();
            $table->string("type_conduite")->nullable();
            $table->string("version")->nullable();
            $table->integer("nombre_porte")->default(0);
            $table->integer("nombre_place")->default(0);
            $table->string("traction")->nullable();
            $table->string("option_interieur")->nullable();
            $table->string("option_exterieur")->nullable();
            $table->string("option_security")->nullable();
            $table->string("option_radio")->nullable();
            $table->string("autre_option")->nullable();
            $table->string("kilometrage")->nullable();
            $table->bigInteger("prix")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
