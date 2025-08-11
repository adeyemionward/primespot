<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendContactFormEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $email;
    public $phone;
    public $title;
    public $messagetext;
    public function __construct($name, $email, $phone, $title, $messagetext)
    {
        $this->name         = $name;
        $this->email        = $email;
        $this->phone        = $phone;
        $this->title      = $title;
        $this->messagetext      = $messagetext;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'A New Message From a Customer',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    public function build()
    {
        return $this->view('mail.contactmail')
                    ->with([
                        'name'      => $this->name,
                        'phone'     => $this->phone,
                        'email'     => $this->email,
                        'title'     => $this->title,
                        'messagetext'   => $this->messagetext,
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
