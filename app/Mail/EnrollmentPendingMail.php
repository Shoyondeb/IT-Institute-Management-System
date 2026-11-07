<?php
// app/Mail/EnrollmentPendingMail.php

namespace App\Mail;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnrollmentPendingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enrollment;
    public $course;
    public $user;
    public $isAdmin;

    /**
     * Create a new message instance.
     */
    public function __construct(Enrollment $enrollment, Course $course, User $user, $isAdmin = false)
    {
        $this->enrollment = $enrollment;
        $this->course = $course;
        $this->user = $user;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if ($this->isAdmin) {
            return new Envelope(
                subject: 'New Enrollment Pending - ' . $this->course->title,
            );
        }

        return new Envelope(
            subject: 'Enrollment Submitted - ' . $this->course->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.enrollment-pending',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
