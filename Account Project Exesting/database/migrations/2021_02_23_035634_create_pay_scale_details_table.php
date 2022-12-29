<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayScaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_scale_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pay_scale_id');
            $table->foreign('pay_scale_id')->references('id')->on('pay_scales')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->double('salary_amount');
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
        Schema::dropIfExists('pay_scale_details');
    }
}
