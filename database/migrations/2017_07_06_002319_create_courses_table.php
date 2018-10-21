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
            $table->string('name',255);
            $table->string('holes',255);
            $table->string('address',255);
            $table->string('phone_number',50);
            $table->string('postal_code',18);
            $table->string('website',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('price')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
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
