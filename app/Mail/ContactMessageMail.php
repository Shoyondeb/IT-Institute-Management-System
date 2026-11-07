<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $subjectText;
    public string $messageText;

    public function __construct(User $user, string $subjectText, string $messageText)
    {
        $this->user = $user;
        $this->subjectText = $subjectText;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->replyTo($this->user->email, $this->user->name)
            ->subject('Contact Form: ' . $this->subjectText)
            ->view('emails.contact');
    }
}
