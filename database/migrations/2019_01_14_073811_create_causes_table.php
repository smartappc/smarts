<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('referral_cause');
            $table->string('victim_name');
            $table->integer('victim_id');
            $table->string('victim_nationality');
            $table->date('victim_birthday');
            $table->string('accused_name');
            $table->integer('accused_id');
            $table->string('accused_nationality');
            $table->date('accused_birthday');
            $table->unsignedInteger('accusation');
            $table->text('description');
            $table->string('author');
            $table->unsignedInteger('officer_id');
            $table->date('officer_date');
            $table->date('act_date');
            $table->string('act_place');
            $table->timestamps();

            $table->foreign('officer_id')->references('id')->on('officers');
          //  $table->foreign('accusation')->references('id')->on('accusations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('causes');
    }
}
