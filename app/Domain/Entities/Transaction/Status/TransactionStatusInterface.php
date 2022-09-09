<?php

namespace App\Domain\Entities\Transaction\Status;

interface TransactionStatusInterface
{
    public function getType(): string;    
}