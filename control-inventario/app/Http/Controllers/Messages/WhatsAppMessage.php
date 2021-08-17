<?php
namespace App\Channels;

use Twilio\Rest\Client;

class WhatsAppChannel
{
    public function send($message, $to)
    {
        $from = config('services.twilio.whatsapp_from');

        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        return $twilio->messages->create('whatsapp:' . $to, [
            "from" => 'whatsapp:' . $from,
            "body" => $message
        ]);
    }
}
