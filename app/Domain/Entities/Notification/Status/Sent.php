<?php

namespace App\Domain\Entities\Notification\Status;

class Sent implements NotificationStatusInterface
{
    public function getType(): string
    {
        return 'SENT';
    }
}