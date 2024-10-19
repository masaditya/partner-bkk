<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewOccupationNotification extends Notification
{
    use Queueable;

    protected $occupation;

    public function __construct($occupation)
    {
        $this->occupation = $occupation;
    }

    public function via($notifiable)
    {
        // Mengirim notifikasi melalui database dan broadcast
        return ['database', 'broadcast'];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => $this->occupation->title,
            'company' => $this->occupation->company,
            'location' => $this->occupation->location,
        ]);
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->occupation->title,
            'company' => $this->occupation->company,
            'location' => $this->occupation->location,
        ];
    }
}
