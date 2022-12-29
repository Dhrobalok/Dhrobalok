<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialoffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialoffers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('course_id')->nullable();
            $table->bigInteger('user_id')->nullable();

            $table->text('special')->nullable();
            $table->bigInteger('active')->nullable();
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
        Schema::dropIfExists('specialoffers');
    }
}
