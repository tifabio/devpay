<?php

namespace App\Domain\Events\Notification;

use App\Domain\Entities\Notification\Notification;
use Illuminate\Queue\SerializesModels;

class SendNotification
{
    use SerializesModels;

    protected $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function getNotification(): Notification
    {
        return $this->notification;
    }
}
