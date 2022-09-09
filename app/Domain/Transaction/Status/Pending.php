<?php

namespace App\Domain\Transaction\Status;

class Pending implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'PENDING';
    }
}