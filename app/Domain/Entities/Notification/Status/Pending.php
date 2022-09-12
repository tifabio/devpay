<?php

namespace App\Domain\Entities\Notification\Status;

class Pending implements NotificationStatusInterface
{
    public function getType(): string
    {
        return 'PENDING';
    }
}