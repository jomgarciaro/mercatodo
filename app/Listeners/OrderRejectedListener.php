<?php

namespace App\Listeners;

use App\Actions\Products\UpdateProductStockAction;
use App\Events\OrderRejected;
use App\Mail\Orders\OrderRejectedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderRejectedListener
{
    public function handle(OrderRejected $event)
    {
        UpdateProductStockAction::orderRejected($event->order);

        Mail::to($event->order->user->email)->send(new OrderRejectedMail());

        Log::info('The order with Id ' . $event->order->id . ' has been rejected.');
    }
}
