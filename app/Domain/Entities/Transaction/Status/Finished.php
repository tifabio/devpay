<?php

namespace App\Domain\Entities\Transaction\Status;

class Finished implements TransactionStatusInterface
{
    public function getType(): string
    {
        return 'FINISHED';
    }
}