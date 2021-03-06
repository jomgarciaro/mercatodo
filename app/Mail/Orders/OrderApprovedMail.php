<?php

namespace App\Mail\Orders;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderApprovedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function build(): self
    {
        return $this->markdown('mail.orders.approved');
    }
}
