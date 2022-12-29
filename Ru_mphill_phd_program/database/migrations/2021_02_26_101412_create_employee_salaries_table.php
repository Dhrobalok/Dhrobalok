<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('salary_generate_id');
            $table->foreign('salary_generate_id')->references('id')->on('salary_generates')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('employee_types')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('basic_salary');
            $table->unsignedBigInteger('employee_payscale_id');
            $table->foreign('employee_payscale_id')->references('id')->on('pay_scales')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('total_add_amount');
            $table->double('total_deduction_amount');
            $table->double('net_amount');

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
        Schema::dropIfExists('employee_salaries');
    }
}
