<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensionProcessEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pension_process_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pension_user_id');
            $table->foreign('pension_user_id')->references('id')->on('pension_users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('pension_process_id');
            $table->foreign('pension_process_id')->references('id')->on('pension_processes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->double('pension_basic_pay');
            $table->double('basic_pension_amount');
            $table->double('health_fee');
            $table->double('bonus');
            $table->double('total_amount');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('pension_process_employee');
    }
}
