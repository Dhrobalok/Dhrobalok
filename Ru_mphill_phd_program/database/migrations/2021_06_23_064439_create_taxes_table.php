<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tax_name');
            $table->string('tax_scope',30);
            $table->string('tax_computation_type',30);
            $table->double('amount');
            $table->string('label_on_invoice')->nullable();
            $table->tinyInteger('is_including_price')->default(0);
            $table->unsignedBigInteger('receivable_account')->nullable();
            $table->foreign('receivable_account')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('payable_account')->nullable();
            $table->foreign('payable_account')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('taxes');
    }
}
