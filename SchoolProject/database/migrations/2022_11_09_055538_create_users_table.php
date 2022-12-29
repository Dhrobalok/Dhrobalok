<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name',100)->nullable();
            $table->string('f_name',100)->nullable();
            $table->string('m_name',100)->nullable();
            $table->string('dob',100)->nullable();
            $table->string('gender',100)->nullable();
            $table->string('b_group',100)->nullable();
            $table->text('image')->nullable();
            $table->string('a_qualification',100)->nullable();
            $table->string('institute',100)->nullable();
            $table->string('p_no',100)->nullable();
            $table->string('e_no',100)->nullable();
            $table->text('email')->nullable();
            $table->text('password')->nullable();
            $table->text('personal_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('mobile')->nullable();

            // $table->string('course',100)->nullable();
            // $table->string('payment',100)->nullable();
            // $table->string('year',100)->nullable();
            // $table->text('image')->nullable();
            // $table->bigInteger('status')->nullable();
            // $table->bigInteger('category')->nullable();
            // $table->text('mobile')->nullable();
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
        Schema::dropIfExists('users');
    }
}
