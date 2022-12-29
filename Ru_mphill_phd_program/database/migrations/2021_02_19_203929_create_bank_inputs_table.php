<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_inputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('voucher_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('voucher_no');
            $table->dateTime('date');
            $table->string('voucher_by');
            $table->string('submitted_by');
            $table->integer('status')->unsigned();
            $table->integer('transaction_method_id')->unsigned();
            $table->unsignedBigInteger('transaction_coa_account');
            $table->foreign('transaction_coa_account')->references('id')->on('chart_of_accounts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('status')->references('id')->on('voucher_status')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('cheque_no')->nullable();
            $table->foreign('transaction_method_id')->references('id')->on('transaction_methods')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('bank_input_masters');
    }
}
