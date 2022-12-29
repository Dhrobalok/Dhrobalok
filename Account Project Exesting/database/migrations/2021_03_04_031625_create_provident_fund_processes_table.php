<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidentFundProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provident_fund_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('process_date');
            $table->unsignedBigInteger('process_by');
            $table->foreign('process_by')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('pf_interest_rate');
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
        Schema::dropIfExists('provident_fund_processes');
    }
}
