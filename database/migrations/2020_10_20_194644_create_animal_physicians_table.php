<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalPhysiciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_physicians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('physician_name');
            $table->string('physician_phone');
            $table->string('physician_job_type');
            $table->string('physician_organization_name')->nullable();
            $table->text('physician_address');
            $table->string('physician_emergency_contact_number')->nullable();
            $table->string('physician_photo')->nullable();
            $table->string('physician_nid')->nullable();
            $table->string('physician_nid_image')->nullable();
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
        Schema::dropIfExists('animal_physicians');
    }
}
