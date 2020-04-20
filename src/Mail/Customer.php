<?php

namespace Zashiki\ContactForm\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Customer extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;

        $this->from(config('contact.from.address'), config('contact.from.name'));

        $to = $data[config('contact.key.email')];

        $this->to($to);

        $bcc = explode(',', config('contact.bcc', ''));
        $bcc = array_filter($bcc, function ($v) {
            return !empty($v);
        });

        if (sizeof($bcc)) {
            $this->bcc($bcc);
        }

        $this->subject(config('contact.subject.customer'));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('contact::email.customer')->with($this->data);
    }
}
