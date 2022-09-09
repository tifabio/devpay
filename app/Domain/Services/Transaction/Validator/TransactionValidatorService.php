<?php

namespace App\Domain\Services\Transaction\Validator;

use App\Domain\Entities\Account\Account;
use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Exceptions\Transaction\InvalidPayerAccountException;

class TransactionValidatorService implements TransactionValidatorServiceInterface
{
    public function validate(Transaction $transaction): void
    {
        $this->validatePayerAccountType($transaction->getPayer());
    }

    private function validatePayerAccountType(Account $payer): void
    {
        if($payer->isShopkeeper()) {
            throw new InvalidPayerAccountException();
        }
    }
}