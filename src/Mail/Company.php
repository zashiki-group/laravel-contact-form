<?php

namespace Zashiki\ContactForm\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Company extends Mailable
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

        $this->to(config('contact.to'));

        $replyToAddress = $data[config('contact.key.email')];
        $replyToName = $data[config('contact.key.name')] ?? null;

        $this->replyTo($replyToAddress, $replyToName);

        $cc = explode(',', config('contact.cc', ''));
        $cc = array_filter($cc, function ($v) {
            return !empty($v);
        });

        if (sizeof($cc)) {
            $this->cc($cc);
        }

        $this->subject(config('contact.subject.company'));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('contact::email.company')->with($this->data);
    }
}
