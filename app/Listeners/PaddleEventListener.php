<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Paddle\Events\WebhookReceived;

class PaddleEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param WebhookReceived $event
     * @return void
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['alert_name'] === 'payment_succeeded') {
            // Handle the incoming event...
            dd('pagamento feito com sucesso');
        }
    }
}
