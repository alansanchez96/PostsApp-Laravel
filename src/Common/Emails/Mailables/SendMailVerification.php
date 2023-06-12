<?php

namespace Src\Common\Emails\Mailables;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class SendMailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly User $user) { }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('postApp@noreply.com', 'PostsApp@CleanArchitecture'),
            subject: 'Bienvenido a PostApp',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.mail-verification',
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
