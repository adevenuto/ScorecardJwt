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
            $table->string('course_phone_number',50)->nullable();
            $table->string('course_postal_code',18);
            $table->string('course_website',255)->nullable();
            $table->string('course_email',255)->nullable();
            $table->boolean('course_membership')->nullable();
            $table->string('price')->nullable();
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->string('holes');
            $table->string('tournament_tee_length');
            $table->string('back_tee_length');
            $table->string('middle_tee_length');
            $table->string('front_tee_length');
            $table->string('tournament_tee_slope_rating')->nullable();
            $table->string('back_tee_slope_rating')->nullable();
            $table->string('middle_tee_slope_rating')->nullable();
            $table->string('front_tee_slope_rating')->nullable();
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
