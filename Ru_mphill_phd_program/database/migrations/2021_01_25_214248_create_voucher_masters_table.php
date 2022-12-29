<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('voucher_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('voucher_no');
            $table->dateTime('date');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('posted_by')->nullable();
            $table->foreign('posted_by')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('submitted_by')->nullable();
            $table->foreign('submitted_by')->references('id')->on('employees')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('status')->unsigned();
            $table->integer('transaction_method_id')->unsigned();
            $table->unsignedBigInteger('transaction_coa_account')->nullable();
            $table->foreign('transaction_coa_account')->references('id')->on('chart_of_accounts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('status')->references('id')->on('voucher_status')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('cheque_no')->nullable();
            $table->foreign('cheque_no')->references('id')->on('cheque_book_pages')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('voucher_masters');
    }
}
