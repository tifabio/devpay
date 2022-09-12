<?php

namespace App\Domain\Listeners\Notification;

use App\Domain\Events\Notification\CreateNotification;
use App\Domain\Services\Notification\NotificationService;

class CreateNotificationListener
{
    private NotificationService $service;

    public function __construct(NotificationService $service)
    {
        $this->service = $service;
    }

    public function handle(CreateNotification $event)
    {
        $notification = $event->getNotification();

        $this->service->create($notification);
    }
}