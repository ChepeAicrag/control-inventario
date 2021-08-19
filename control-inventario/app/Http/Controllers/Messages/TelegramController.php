<?php
namespace App\Http\Controllers\Messages;

use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramChannel;

use Illuminate\Notifications\Notification;

class TelegramController extends Notification
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content("Hola desde la api de prueba");
    }
}
