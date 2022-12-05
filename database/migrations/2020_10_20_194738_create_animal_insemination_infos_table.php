<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalInseminationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_insemination_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('animal_profile_id');
            $table->date('insemination_date');
            $table->bigInteger('insemination_company_id');
            $table->bigInteger('bull_info_id')->nullable();
            $table->string('insemination_status_birth_status');
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
        Schema::dropIfExists('animal_insemination_infos');
    }
}
