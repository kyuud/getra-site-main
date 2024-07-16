<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details, $attach;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $attach)
    {
        $this->details = $details;
        $this->attach = $attach;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->subject('Mensagem do site - GETRA  (Currículo)')
            ->attach($this->attach)
            ->markdown('Site.mails.work');
    }
}
