<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginActivityEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $subject = 'Login activity via email.';

    /**
     * @var mixed
     */
    public $location;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($location)
    {
        //learn how to add extra data to our mail component
        $this->location($location);
    }

    /**
     * @param  $location
     * @return mixed
     */
    public function location($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->markdown('emails.login_activity')
            ->with(['location' => $this->location]);
    }
}
