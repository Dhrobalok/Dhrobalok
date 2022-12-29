<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidentFundProcessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provident_fund_process_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('pf_process_id');
            $table->foreign('pf_process_id')->references('id')->on('provident_fund_processes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('employee_payscale_id');
            $table->foreign('employee_payscale_id')->references('id')->on('employee_pay_scales')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('basic_pay');
            $table->integer('year');
            $table->string('month');
            $table->double('pf_amount');
            $table->double('loan_amount');
            $table->double('pf_interest_rate');
            $table->double('opening_balance');
            $table->double('closing_balance');
            $table->date('pf_date');
            $table->double('interest_amount');
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
        Schema::dropIfExists('provident_fund_process_details');
    }
}
