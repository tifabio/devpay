<?php

namespace App\Domain\Transaction\Status;

class Finished implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'FINISHED';
    }
}