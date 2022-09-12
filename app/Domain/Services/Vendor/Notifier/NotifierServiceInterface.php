<?php

namespace App\Domain\Services\Vendor\Notifier;

use App\Domain\Entities\Notification\Notification;

interface NotifierServiceInterface
{
    public function sendNotification(Notification $notification): bool;
}