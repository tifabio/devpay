<?php

namespace App\Domain\Entities\Transaction\Status;

class Pending implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'PENDING';
    }
}