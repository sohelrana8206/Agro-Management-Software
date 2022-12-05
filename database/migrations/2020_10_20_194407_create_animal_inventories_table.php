<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('animal_profile_id');
            $table->bigInteger('estimated_price');
            $table->string('animal_status');
            $table->integer('user_id')->comment('Create User');
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
        Schema::dropIfExists('animal_inventories');
    }
}
