<?php

namespace App\Domain\Services\Transaction\Validator;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Exceptions\Transaction\InsufficientBalanceException;
use App\Domain\Exceptions\Transaction\InvalidPayerAccountException;

class TransactionValidatorService implements TransactionValidatorServiceInterface
{
    public function validate(Transaction $transaction): void
    {
        $this->validatePayerAccountType($transaction);
        $this->validatePayerAccountBalance($transaction);
    }

    private function validatePayerAccountType(Transaction $transaction): void
    {
        $payer = $transaction->getPayer();
        if($payer->isShopkeeper()) {
            throw new InvalidPayerAccountException();
        }
    }

    private function validatePayerAccountBalance(Transaction $transaction): void
    {
        $payer = $transaction->getPayer();
        if($payer->getBalance() < $transaction->getAmount()) {
            throw new InsufficientBalanceException();
        }
    }
}