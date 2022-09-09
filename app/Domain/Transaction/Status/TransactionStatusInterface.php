<?php

namespace App\Domain\Transaction\Status;

interface TransactionStatusInterface
{
    public function getType(): string;    
}