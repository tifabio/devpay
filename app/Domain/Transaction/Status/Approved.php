<?php

namespace App\Domain\Transaction\Status;

class Approved implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'APPROVED';
    }
}