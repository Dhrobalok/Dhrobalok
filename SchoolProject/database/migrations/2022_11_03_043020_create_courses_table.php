<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');

            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('fees')->nullable();
            $table->bigInteger('duration')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->text('image')->nullable();
            $table->bigInteger('feature')->nullable();
            $table->integer('active')->nullable();
            $table->text('learning_site')->nullable();
           
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
