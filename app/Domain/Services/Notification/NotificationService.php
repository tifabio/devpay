<?php

namespace App\Domain\Services\Notification;

use App\Domain\Entities\Notification\Notification;
use App\Domain\Services\Vendor\Notifier\NotifierServiceInterface;

class NotificationService
{
    private NotifierServiceInterface $notifierService;

    public function __construct(
        NotifierServiceInterface $notifierService
    ) {
        $this->notifierService = $notifierService;
    }

    public function create(Notification $notification)
    {
        dd($notification);
    }
}