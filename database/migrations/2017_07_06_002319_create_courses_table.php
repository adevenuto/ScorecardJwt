<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_name',255);
            $table->string('course_holes',255);
            $table->string('course_address',255);
            $table->string('course_phone_number',50);
            $table->string('course_postal_code',18);
            $table->string('course_website',255)->nullable();
            $table->string('course_email',255)->nullable();
            $table->string('course_price')->nullable();
            $table->string('course_country')->nullable();
            $table->string('course_state')->nullable();
            $table->string('course_city')->nullable();
            $table->timestamps();
        });
        Schema::create('course_user', function(Blueprint $table) {
            $table->integer('course_id');
            $table->integer('user_id');
            $table->primary(['course_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_user');
    }
}
