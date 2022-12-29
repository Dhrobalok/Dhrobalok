<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseenrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseenrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->double('amount')->nullable();
            $table->bigInteger('category')->nullable();
            $table->bigInteger('course')->nullable();
            $table->string('time',100)->nullable();
            $table->string('day',100)->nullable();
            $table->string('criteria',100)->nullable();
            $table->integer('active')->nullable();
            $table->text('tran_id')->nullable();
            $table->text('amount')->nullable();
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
        Schema::dropIfExists('courseenrolls');
    }
}
