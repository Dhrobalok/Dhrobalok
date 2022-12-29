<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankInputDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_input_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('entry_date');
            $table->unsignedBigInteger('voucher_master_id');
            $table->foreign('voucher_master_id')->references('id')->on('bank_inputs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('coa_id');
            $table->foreign('coa_id')->references('id')->on('chart_of_accounts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('description');
            $table->double('debit_amount');
            $table->double('credit_amount');
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
        Schema::dropIfExists('bank_input_details');
    }
}
