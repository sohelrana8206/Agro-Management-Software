<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_healths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('animal_profile_id');
            $table->bigInteger('animal_health_condition_id');
            $table->date('start_date');
            $table->time('start_time');
            $table->text('note');
            $table->text('treatment')->comment('Doctors Consultation');
            $table->bigInteger('animal_medicine_vaccine_id');
            $table->bigInteger('physician_id');
            $table->dateTime('animal_visit_date_time')->nullable();
            $table->text('physician_comments');
            $table->bigInteger('employee_id')->comment('Responsibility Person');
            $table->string('treatment_status');
            $table->text('treatment_action_note')->nullable();
            $table->string('animal_health_status');
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
        Schema::dropIfExists('animal_healths');
    }
}
