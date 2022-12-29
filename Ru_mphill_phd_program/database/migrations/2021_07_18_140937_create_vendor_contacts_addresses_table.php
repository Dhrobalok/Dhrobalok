<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorContactsAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_contacts_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->string('job_position',100)->nullable();
            $table->string('phone_number',20)->nullable();
            $table->string('mobile_number',20)->nullable();
            $table->string('email_address');
            $table->string('street',50)->nullable();
            $table->string('city',50)->nullable();
            $table->string('state',50)->nullable();
            $table->string('zip_code',50)->nullable();
            $table->string('country');
            $table->string('internal_notes')->nullable();
            $table->string('contacts_type');
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
        Schema::dropIfExists('vendor_contacts_addresses');
    }
}
