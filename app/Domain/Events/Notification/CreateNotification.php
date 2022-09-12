<?php

namespace App\Domain\Events\Notification;

use App\Domain\Entities\Notification\Notification;
use App\Domain\Entities\Notification\Status\Pending;
use App\Domain\Entities\Transaction\Transaction;
use Illuminate\Queue\SerializesModels;

class CreateNotification
{
    use SerializesModels;

    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getNotification(): Notification
    {
        $notification = new Notification();
        $notification->setContent($this->transaction->getNotificationContent());
        $notification->setNotificationStatus(new Pending());

        return $notification;
    }
}
