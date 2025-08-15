<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class CustomerOrderToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $userDetails;
    public $booking;
    public $pdf_attachment;
    public function __construct($userDetails, $booking, $pdf_attachment)
    {
        $this->userDetails  = $userDetails;
        $this->booking   = $booking;
        $this->pdf_attachment      = $pdf_attachment;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Customer Booking Receipt',
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
    //         view: 'testmail',
    //         orderDetails: $this->orderDetails,
    //     );
    // }

    public function build()
    {
        return $this->view('mail.ordermailtoadmin')
                    ->with([
                        'orderDetails' => $this->booking,
                        'userDetails' => $this->userDetails,
                    ])->attachData($this->pdf_attachment->output(), 'primespot-invoice.pdf');
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
