<?php
    namespace App\Mail;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    class EmailContact extends Mailable
{
    use Queueable, SerializesModels;
    
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->details['email'])
            ->subject('Contato')
            ->markdown('Site.mails.exmpl');
    }

}