<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailsettings', function (Blueprint $table) {
            $table->id();

            $table->text('mail_transport')->nullable();
            $table->text('mail_host')->nullable();

            $table->text('mail_port')->nullable();
            $table->text('mail_username')->nullable();
            $table->text('mail_pass')->nullable();
            $table->text('mail_encrypt')->nullable();
            $table->text('mail_form')->nullable();

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
        Schema::dropIfExists('mailsettings');
    }
}
