<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensionProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pension_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('process_date');
            $table->double('total_amount');
            $table->unsignedBigInteger('process_by');
            $table->foreign('process_by')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('pension_process');
    }
}
