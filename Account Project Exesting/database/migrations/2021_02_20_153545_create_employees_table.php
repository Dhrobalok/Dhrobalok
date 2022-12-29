<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender',10);
            $table->string('mobile_no');
            $table->date('date_of_birth');
            $table->string('nid_number',50);
            $table->string('tin_number',50);
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('employee_photo')->nullable();
            $table->date('joining_date')->nullable();
            $table->date('retired_date')->nullable();
            $table->string('employee_reg_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id')->references('id')->on('banks')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->foreign('division_id')->references('id')->on('employee_divisions')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('employee_sections')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('account_no')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('employees');
    }
}
