<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('batch')->nullable();
            $table->text('time')->nullable();
            $table->text('day')->nullable();
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
        Schema::dropIfExists('usertimes');
    }
}
