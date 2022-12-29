<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetAccountingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_accountings', function (Blueprint $table) {
            $table->id();
            $table->integer('budget_id');
            $table->integer('coa_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->double('cost');
            $table->integer('status');
            $table->double('spend');
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
        Schema::dropIfExists('budget_accountings');
    }
}
