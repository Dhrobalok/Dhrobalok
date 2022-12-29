<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePayScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_pay_scales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('payscale_id');
            $table->foreign('payscale_id')->references('id')->on('pay_scales')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('payscale_details_id');
            $table->foreign('payscale_details_id')->references('id')->on('pay_scale_details')
            ->onUpdate('cascade')
            ->onDelete('cascade');
             $table->tinyInteger('status');
             $table->date('start_date');
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
        Schema::dropIfExists('employee_pay_scales');
    }
}
