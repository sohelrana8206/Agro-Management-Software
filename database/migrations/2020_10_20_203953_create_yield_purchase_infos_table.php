<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYieldPurchaseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yield_purchase_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('yield_id');
            $table->string('previous_yield_owner_name');
            $table->text('previous_yield_owner_address');
            $table->date('yield_purchase_date');
            $table->string('yield_purchase_cost');
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
        Schema::dropIfExists('yield_purchase_infos');
    }
}
