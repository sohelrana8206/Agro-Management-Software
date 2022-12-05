<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalBornInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_born_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('animal_profile_id');
            $table->string('animal_born_type');
            $table->string('animal_maturity');
            $table->bigInteger('animal_mother_profile_id');
            $table->bigInteger('animal_estimated_price');
            $table->string('animal_born_status');
            $table->integer('animal_physician_id')->nullable();
            $table->integer('insemination_company_id')->nullable();
            $table->integer('bull_info_id')->nullable();
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
        Schema::dropIfExists('animal_born_infos');
    }
}
