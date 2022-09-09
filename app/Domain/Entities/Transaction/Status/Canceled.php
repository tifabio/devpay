<?php

namespace App\Domain\Entities\Transaction\Status;

class Canceled implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'CANCELED';
    }
}