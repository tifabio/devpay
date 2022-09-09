<?php

namespace App\Domain\Services\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Services\Transaction\Validator\TransactionValidatorServiceInterface;

class TransactionService
{
    private TransactionValidatorServiceInterface $validatorService;

    public function __construct(
        TransactionValidatorServiceInterface $validatorService
    ) {
        $this->validatorService = $validatorService;
    }

    public function create(Transaction $transaction)
    {
        $this->validatorService->validate($transaction);
    }
}