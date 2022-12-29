<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_setups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('salary_accounts',50);
            $table->string('provident_fund_accounts',50);
            $table->string('house_build_loans_accounts',50);
            $table->string('pension_accounts',50);
            $table->string('gratuity_accounts',50);
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
        Schema::dropIfExists('account_setups');
    }
}
