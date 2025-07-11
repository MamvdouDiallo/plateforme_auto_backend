<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vehicules', function (Blueprint $table) {
            $table->string('size')->nullable();
            $table->string('condition')->nullable();
            $table->string('engine')->nullable();
            $table->integer('cylinders')->nullable();
            $table->string('color')->nullable();
            $table->string('vin')->nullable()->unique();
            $table->year('year')->nullable();
            $table->text('description')->nullable();
            $table->string('technical_sheet')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('vehicules', function (Blueprint $table) {
            $columns = [
                'size',
                'condition',
                'engine',
                'cylinders',
                'color',
                'vin',
                'year',
                'description',
                'technical_sheet'
            ];
            
            if (method_exists($table, 'dropColumnIfExists')) {
                foreach ($columns as $column) {
                    $table->dropColumnIfExists($column);
                }
            } else {
                foreach ($columns as $column) {
                    if (Schema::hasColumn('vehicules', $column)) {
                        $table->dropColumn($column);
                    }
                }
            }
        });
    }
};
