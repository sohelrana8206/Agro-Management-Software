<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnimalProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('animal_name');
            $table->string('animal_type');
            $table->string('animal_registration_no');
            $table->date('animal_birth_date');
            $table->integer('animal_age');
            $table->string('animal_gender');
            $table->string('animal_current_location');
            $table->string('animal_height');
            $table->string('animal_weight');
            $table->string('animal_color');
            $table->integer('animal_breed_id');
            $table->string('animal_pic');
            $table->string('animal_teeth_availability');
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
        Schema::dropIfExists('animal_profiles');
    }
}
