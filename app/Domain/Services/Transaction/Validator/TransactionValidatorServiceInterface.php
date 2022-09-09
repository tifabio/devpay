<?php

namespace App\Domain\Services\Transaction\Validator;

use App\Domain\Entities\Transaction\Transaction;

interface TransactionValidatorServiceInterface
{
    public function validate(Transaction $transaction): void;
}