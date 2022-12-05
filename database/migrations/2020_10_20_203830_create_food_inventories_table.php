<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('food_name');
            $table->string('food_quality');
            $table->string('food_quantity');
            $table->string('food_cost');
            $table->string('food_status');
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
        Schema::dropIfExists('food_inventories');
    }
}
