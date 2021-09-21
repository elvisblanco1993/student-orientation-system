<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteUser extends Mailable
{
    use Queueable, SerializesModels;

    public $orientation_id, $token, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $orientation_id)
    {
        $this->token = $token;
        $this->orientation_id = $orientation_id;
        $this->url = config('app.url') . '/register/invitation/' . $this->token . '/' . $this->orientation_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.invite-user');
    }
}
