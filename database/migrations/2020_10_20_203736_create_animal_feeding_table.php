<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalFeedingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_feeding', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('animal_profile_id');
            $table->bigInteger('food_inventory_id');
            $table->string('food_quantity');
            $table->string('food_cost');
            $table->dateTime('feeding_time');
            $table->bigInteger('employee_id')->comment('Responsibility Person');
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
        Schema::dropIfExists('animal_feeding');
    }
}
