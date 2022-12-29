<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number',20)->nullable();
            $table->string('mobile_number',20)->nullable();
            $table->string('email_address');
            $table->string('street',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('zip_code',50)->nullable();
            $table->string('country');
            $table->unsignedBigInteger('account_receivable')->nullable();
            $table->foreign('account_receivable')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('account_payable')->nullable();
            $table->foreign('account_payable')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('tax_id',50)->nullable();
            $table->string('website')->nullable();
            $table->string('note')->nullable();
            $table->string('photo_url')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
