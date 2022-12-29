<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voucher_master_id')->nullable();
            $table->foreign('voucher_master_id')->references('id')->on('voucher_masters')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('voucher_detail_id')->nullable();
            $table->foreign('voucher_detail_id')->references('id')->on('voucher_details')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('transaction_coa_id')->nullable();
            $table->foreign('transaction_coa_id')->references('id')->on('chart_of_accounts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedInteger('cost_center_id')->nullable();
            $table->foreign('cost_center_id')->references('id')->on('cost_centers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('coa_id');
            $table->foreign('coa_id')->references('id')->on('chart_of_accounts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->double('debit_amount');
            $table->double('credit_amount');
            $table->dateTime('voucher_date');
            $table->date('generation_date');
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
        Schema::dropIfExists('ledgers');
    }
}
