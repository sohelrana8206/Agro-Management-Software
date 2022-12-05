<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('food_inventory_id');
            $table->string('food_supplier_name')->nullable();
            $table->string('food_supplier_phone')->nullable();
            $table->string('food_supplier_address')->nullable();
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
        Schema::dropIfExists('food_purchases');
    }
}
