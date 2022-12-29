<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')->references('id') ->on('house_building_loans')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('principal_coa_id');
            $table->foreign('principal_coa_id')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('interest_coa_id');
            $table->foreign('interest_coa_id')->references('id')->on('chart_of_accounts')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('loan_settings');
    }
}
