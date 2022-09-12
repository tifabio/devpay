<?php

namespace App\Domain\Listeners\Notification;

use App\Domain\Events\Notification\SendNotification;
use App\Domain\Services\Notification\NotificationService;

class SendNotificationListener
{
    private NotificationService $service;

    public function __construct(NotificationService $service)
    {
        $this->service = $service;
    }

    public function handle(SendNotification $event)
    {
        $notification = $event->getNotification();

        $this->service->send($notification);
    }
}