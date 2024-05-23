<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $orderDetails;
    public $senderEmails;

    public function __construct($orderDetails, $senderEmails)
    {
        $this->orderDetails = $orderDetails;
        $this->senderEmails = $senderEmails;
    }

    /**
     * Get the message envelope.
     */

     public function build()
     {
         return $this->from($this->senderEmails, '')
         ->subject("Your Order (#{$this->orderDetails['order_id']})")
         ->view('frontend.mail.order');
     }


}
