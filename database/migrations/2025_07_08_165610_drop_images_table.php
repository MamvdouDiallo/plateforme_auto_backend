<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropImagesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('images');
    }

    public function down()
    {
        // Recréer la table images si nécessaire
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicule_id')->constrained();
            $table->string('path');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
}
