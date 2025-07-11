<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('vehicules', function (Blueprint $table) {
        $columns = [
            'size' => 'string',
            'condition' => 'string',
            'engine' => 'string',
            'cylinders' => 'integer',
            'color' => 'string',
            'vin' => 'string',
            'year' => 'year',
            'description' => 'text',
            'technical_sheet' => 'string',  
        ];

        foreach ($columns as $column => $type) {
            if (!Schema::hasColumn('vehicules', $column)) {
                $table->$type($column)->nullable();
            }
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
