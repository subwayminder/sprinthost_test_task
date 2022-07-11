<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->integer('max_size');
            $table->decimal('growth_factor');
        });

        DB::table('animal_types')->insert(
            [
                'type' => 'Dog',
                'max_size' => 25,
                'growth_factor' => 1
            ],
        );
        DB::table('animal_types')->insert(
            [
                'type' => 'Cat',
                'max_size' => 15,
                'growth_factor' => 1.2
            ],
        );
        DB::table('animal_types')->insert(
            [
                'type' => 'Bird',
                'max_size' => 10,
                'growth_factor' => 1.5
            ],
        );
        DB::table('animal_types')->insert(
            [
                'type' => 'Rat',
                'max_size' => 8,
                'growth_factor' => 2
            ],
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_types');
    }
};
