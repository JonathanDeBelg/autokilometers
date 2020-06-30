<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKilometers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kilometers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('by');
            $table->bigInteger('mileage_new');
            $table->bigInteger('mileage_old');
            $table->boolean('costs_for_parents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kilometers');
    }
}
