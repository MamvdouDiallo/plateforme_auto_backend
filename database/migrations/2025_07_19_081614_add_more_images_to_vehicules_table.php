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
        Schema::table('vehicules', function (Blueprint $table) {
            $table->string('image6')->nullable()->after('image5');
            $table->string('image7')->nullable()->after('image6');
            $table->string('image8')->nullable()->after('image7');
            $table->string('image9')->nullable()->after('image8');
            $table->string('image10')->nullable()->after('image9');
            $table->string('image11')->nullable()->after('image10');
            $table->string('image12')->nullable()->after('image11');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicules', function (Blueprint $table) {
            $table->dropColumn([
                'image6',
                'image7',
                'image8',
                'image9',
                'image10',
                'image11',
                'image12'
            ]);
        });
    }
};
