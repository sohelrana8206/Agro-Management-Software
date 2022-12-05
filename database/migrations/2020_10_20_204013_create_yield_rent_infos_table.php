<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYieldRentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yield_rent_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('yield_id');
            $table->string('yield_owner_name');
            $table->string('yield_owner_phone');
            $table->string('yield_owner_address');
            $table->date('yield_rent_start_date');
            $table->date('yield_rent_end_date');
            $table->string('yield_rent_cost');
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
        Schema::dropIfExists('yield_rent_infos');
    }
}
