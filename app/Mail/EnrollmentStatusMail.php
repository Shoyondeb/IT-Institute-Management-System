<?php

namespace App\Mail;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnrollmentStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $enrollment;
    public $course;
    public $user;
    public $status;

    public function __construct(Enrollment $enrollment, Course $course, User $user, $status)
    {
        $this->enrollment = $enrollment;
        $this->course = $course;
        $this->user = $user;
        $this->status = $status;
    }

    public function envelope(): Envelope
    {
        if ($this->status === 'verified') {
            return new Envelope(
                subject: '✅ Enrollment Verified - ' . $this->course->title,
            );
        }

        return new Envelope(
            subject: '❌ Enrollment Rejected - ' . $this->course->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enrollment-status',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
