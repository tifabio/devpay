<?php

namespace App\Infrastructure\ORM\Repositories;

use App\Domain\Entities\Notification\Notification;
use App\Infrastructure\ORM\Models\Notification as Model;

class NotificationRepository
{
    public function createNotification(Notification $notification)
    {
        return Model::create([
            'content' => $notification->getContent(),
            'notification_status' => $notification->getNotificationStatus()->getType()
        ]);
    }

    public function updateNotification(Notification $notification)
    {

        return Model::where('id', $notification->getUid())
                    ->update([
                        'notification_status' => $notification->getNotificationStatus()->getType()
                    ]);
    }
}