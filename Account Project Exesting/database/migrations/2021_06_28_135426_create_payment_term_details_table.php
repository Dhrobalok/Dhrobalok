<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentTermDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_term_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_terms_id')->nullable();
            $table->foreign('payment_terms_id')->references('id')->on('payment_terms')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('due_type')->nullable();
            $table->double('amount');
            $table->integer('number_of_days')->nullable();
            $table->string('option')->nullable();
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
        Schema::dropIfExists('payment_term_details');
    }
}
