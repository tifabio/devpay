<?php

namespace App\Domain\Services\Notification;

use App\Domain\Entities\Notification\Notification;
use App\Domain\Entities\Notification\Status\Pending;
use App\Domain\Entities\Notification\Status\Sent;
use App\Domain\Services\Vendor\Notifier\NotifierServiceInterface;
use App\Infrastructure\ORM\Repositories\NotificationRepository;

class NotificationService
{
    private NotifierServiceInterface $notifierService;
    private NotificationRepository $notificationRepo;

    public function __construct(
        NotifierServiceInterface $notifierService,
        NotificationRepository $notificationRepo
    ) {
        $this->notifierService = $notifierService;
        $this->notificationRepo = $notificationRepo;
    }

    public function create(Notification $notification)
    {
        $notification->setNotificationStatus(new Pending());
        return $this->notificationRepo->createNotification($notification);
    }

    public function send(Notification $notification)
    {
        if($this->notifierService->sendNotification($notification)) {
            $notification->setNotificationStatus(new Sent());
            $this->notificationRepo->updateNotification($notification);
        }

        return $notification;
    }
}