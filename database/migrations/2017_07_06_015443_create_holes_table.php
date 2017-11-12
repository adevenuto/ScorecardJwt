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
            $table->string('hole_number',255);
            $table->string('hole_group_name')->nullable();
            $table->string('hole_tee_box')->nullable();
            $table->string('handicap')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('holes');
    }
}
