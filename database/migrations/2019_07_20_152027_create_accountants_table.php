<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountant_patient', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->integer('patient_id')->unsigned();
            $table->string('services');
            $table->string('total_amount');
            $table->string('assured_amount');
            $table->string('paid');
            $table->string('rest');
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
        Schema::dropIfExists('accountants');
    }
}
