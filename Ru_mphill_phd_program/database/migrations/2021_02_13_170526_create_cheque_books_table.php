<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('registration_date');
            $table->string('issued_by');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('account_no');
            $table->foreign('account_no')->references('id')->on('chart_of_accounts')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('chequebook_no');
            $table->integer('start_page_no');
            $table->integer('end_page_no');
            $table->integer('total_page_number');
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
        Schema::dropIfExists('cheque_books');
    }
}
