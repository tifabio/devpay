<?php

namespace App\Domain\Services\Vendor\Notifier;

use App\Domain\Entities\Transaction\Transaction;

interface NotifierServiceInterface
{
    public function sendNotification(Transaction $transaction): bool;
}