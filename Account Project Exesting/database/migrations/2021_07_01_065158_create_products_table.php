<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('product_type',50);
            $table->double('price');
            $table->double('cost')->default(0.0);
            $table->unsignedBigInteger('account_receivable')->nullable();
            $table->foreign('account_receivable')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('account_payable')->nullable();
            $table->foreign('account_payable')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('internal_reference')->nullable();
            $table->string('bar_code')->nullable();
            $table->string('product_image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
