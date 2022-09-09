<?php

namespace App\Domain\Entities\Transaction\Status;

class Approved implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'APPROVED';
    }
}