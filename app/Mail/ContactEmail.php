<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $oContactDetails;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($oContactDetails)
    {
        
        $this->oContactDetails = $oContactDetails;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('non-reply@tuproximaprop.com')
                    ->view('mails.contact')
                    ->text('mails.contact_plain');
    }
}
