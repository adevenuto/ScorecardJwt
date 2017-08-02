<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolesTable extends Migration
{
    public function up()
    {
        Schema::create('holes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->string('hole_number',2);
            $table->string('tournament_tee_length',3)->nullable();
            $table->string('back_tee_length',3)->nullable();
            $table->string('middle_tee_length',3)->nullable();
            $table->string('front_tee_length',3)->nullable();
            $table->string('handicap')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('holes');
    }
}
