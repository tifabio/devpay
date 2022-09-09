<?php

namespace App\Domain\Transaction\Status;

class Canceled implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'CANCELED';
    }
}