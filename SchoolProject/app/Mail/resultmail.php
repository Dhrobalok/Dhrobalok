<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Company_settings;

class resultmail extends Mailable
{
    use Queueable, SerializesModels;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $company_name=Company_settings::first();
        return $this->subject($company_name->name)
                    ->view('backend.Mail.resultmail');
    }
}
