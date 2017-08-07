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
            $table->string('course_address',255);
            $table->string('course_phone_number',50);
            $table->string('course_postal_code',18);
            $table->string('course_website',255)->nullable();
            $table->string('course_email',255)->nullable();
            $table->string('course_price')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('course_holes')->nullable();
            $table->string('gold_tee_length',255)->nullable();
            $table->string('blue_tee_length',255)->nullable();
            $table->string('white_tee_length',255)->nullable();
            $table->string('red_tee_length',255)->nullable();
            $table->string('gold_tee_slope_rating',255)->nullable();
            $table->string('blue_tee_slope_rating',255)->nullable();
            $table->string('white_tee_slope_rating',255)->nullable();
            $table->string('red_tee_slope_rating',255)->nullable();
            $table->boolean('driving_range')->nullable();
            $table->boolean('chipping_green')->nullable();
            $table->boolean('putting_green')->nullable();
            $table->boolean('practice_bunker')->nullable();
            $table->boolean('pull_carts')->nullable();
            $table->boolean('motorized_carts')->nullable();
            $table->boolean('pro_shop')->nullable();
            $table->boolean('golf_lessons')->nullable();
            $table->boolean('caddies')->nullable();
            $table->boolean('lockers')->nullable();
            $table->boolean('restaurant')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
