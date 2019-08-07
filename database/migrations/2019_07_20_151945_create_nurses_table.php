<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurse_patient', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('patient_id')->unsigned();
            $table->string('weight');
            $table->string('pregnancy_status');
            $table->string('symptoms');
            $table->string('lab_examinations');
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
        Schema::dropIfExists('nurses');
    }
}
