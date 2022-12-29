<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGratuityProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gratuity_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gratuity_user_id');
            $table->foreign('gratuity_user_id')->references('id')->on('gratuity_users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->double('last_basic_pay');
            $table->double('percentage_basic_pay');
            $table->double('mandatory_pf_per_tk');
            $table->double('total_amount');
            $table->integer('year');
            $table->string('month');
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
        Schema::dropIfExists('gratuity_process');
    }
}
