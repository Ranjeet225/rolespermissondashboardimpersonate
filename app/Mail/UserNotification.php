<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $email_body;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $email_body, $attachment = null)
    {
        $this->subject = $subject;
        $this->email_body = $email_body;
        $this->attachment = $attachment;
    }

    public function build()
    {
        $email = $this->subject($this->subject)
                      ->view('admin.email.lead-user-email')
                      ->with([
                          'email_body' => $this->email_body,
                          'subject' => $this->subject
                      ]);

        if ($this->attachment) {
            $email->attach($this->attachment);
        }

        return $email;
    }
}
