<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackLoanPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_loan_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('pay_date');
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')->references('id')->on('house_building_loans')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('month_no');
            $table->double('pm_begin');
            $table->double('emi');
            $table->double('interest');
            $table->double('repayment');
            $table->double('close_balance');
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
        Schema::dropIfExists('track_loan_payments');
    }
}
