<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('food_inventory_id');
            $table->string('yield_name');
            $table->string('yield_location');
            $table->string('yield_size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yields');
    }
}
