<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidentFundRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provident_fund_rules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payscale_id');
            $table->foreign('payscale_id')->references('id')->on('pay_scales')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->double('min_rate_percentage')->default(5.0);
            $table->double('max_rate_percentage')->default(5.0);
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
        Schema::dropIfExists('provident_fund_rules');
    }
}
