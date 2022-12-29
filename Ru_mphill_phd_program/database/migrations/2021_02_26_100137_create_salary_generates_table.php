<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryGeneratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_generates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year');
            $table->string('month');
            $table->date('generate_date');
            $table->unsignedBigInteger('generated_by');
            $table->foreign('generated_by')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('grand_total_salary');
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
        Schema::dropIfExists('salary_generates');
    }
}
