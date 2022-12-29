<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeBookPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_book_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cheque_book_id');
            $table->foreign('cheque_book_id')->references('id')->on('cheque_books')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('page_number');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('voucher_master_id')->nullable();
            $table->foreign('voucher_master_id')->references('id')->on('voucher_masters')
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
        Schema::dropIfExists('cheque_book_pages');
    }
}
