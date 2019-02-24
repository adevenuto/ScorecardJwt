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
            $table->integer('user_id');
            $table->string('name',255);
            $table->string('address',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('phone_number',255);
            $table->string('website',255)->nullable();

            $table->boolean('driving_range')->nullable();
            $table->boolean('putting_green')->nullable();
            $table->boolean('caddie')->nullable();
            $table->boolean('pro_Shop')->nullable();

            $table->string('lat',255)->nullable();
            $table->string('lng',255)->nullable();

            $table->string('street_number',255)->nullable();
            $table->string('route',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('postal_code',255)->nullable();
            $table->string('country',255)->nullable();

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
        Schema::dropIfExists('course_user');
    }
}
