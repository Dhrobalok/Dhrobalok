<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalaryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_salary_id');
            $table->foreign('employee_salary_id')->references('id')->on('employee_salaries')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('salary_generate_id');
            $table->foreign('salary_generate_id')->references('id')->on('salary_generates')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('segment_id');
            $table->foreign('segment_id')->references('id')->on('salary_segments')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('amount');

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
        Schema::dropIfExists('employee_salary_details');
    }
}
