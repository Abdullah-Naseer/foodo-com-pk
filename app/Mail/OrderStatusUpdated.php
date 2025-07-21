<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $recipientType;

    /**
     * Create a new message instance.
     *
     * @param  mixed  $order
     * @param  string  $recipientType
     */
    public function __construct($order, $recipientType)
    {
        $this->order = $order;
        $this->recipientType = $recipientType; // 'admin' or 'user'
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->recipientType === 'admin'
            ? "Order #{$this->order->id} Status Updated (Admin Notification)"
            : "Your Order #{$this->order->id} Status Updated";

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = 'emails.orders.status_updated';

        return new Content(
            view: $view,
            with: [
                'order' => $this->order,
                'recipientType' => $this->recipientType,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
