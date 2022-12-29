<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankInputMastersTable extends Migration
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
            $table->string('voucher_no');
            $table->string('voucher_by');
            $table->string('submitted_by')->nullable();
            $table->unsignedBigInteger('bank_coa_account');
            $table->foreign('bank_coa_account')->references('id')->on('chart_of_accounts')
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
