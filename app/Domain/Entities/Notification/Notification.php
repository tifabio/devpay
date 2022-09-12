<?php

namespace App\Domain\Entities\Notification;

use App\Domain\Entities\Account\Account;
use App\Domain\Entities\Notification\Status\NotificationStatusInterface;

class Notification
{
    private int $uid;
    private string $content;
    private NotificationStatusInterface $notificationStatus;

    public function getUid(): int
    {
        return $this->uid;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function getNotificationStatus(): NotificationStatusInterface
    {
        return $this->notificationStatus;
    }

    public function setNotificationStatus(NotificationStatusInterface $notificationStatus)
    {
        $this->notificationStatus = $notificationStatus;
    }
}