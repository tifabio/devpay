<?php

namespace App\Domain\Entities\Notification\Status;

interface NotificationStatusInterface
{
    public function getType(): string;    
}