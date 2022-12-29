<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGratuityUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gratuity_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->dateTime('retd_date');
            $table->dateTime('gratuity_date');
            $table->integer('status');
            $table->integer('total_service_year');
            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('payscale_id');
            $table->foreign('payscale_id')->references('id')->on('pay_scales')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('payscale_detail_id');
            $table->foreign('payscale_detail_id')->references('id')->on('pay_scale_details')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->double('last_basic_pay');
            $table->double('percentage_basic_pay');
            $table->double('mandatory_pf_per_tk');
            $table->double('total_amount');
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
        Schema::dropIfExists('gratuity_users');
    }
}
