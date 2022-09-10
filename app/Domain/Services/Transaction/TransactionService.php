<?php

namespace App\Domain\Services\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Services\Transaction\Validator\TransactionValidatorServiceInterface;
use App\Infrastructure\ORM\Repositories\TransactionRepository;

class TransactionService
{
    private TransactionValidatorServiceInterface $validatorService;
    private TransactionRepository $transactionRepo;

    public function __construct(
        TransactionValidatorServiceInterface $validatorService,
        TransactionRepository $transactionRepo
    ) {
        $this->validatorService = $validatorService;
        $this->transactionRepo = $transactionRepo;
    }

    public function create(Transaction $transaction)
    {
        $this->validatorService->validate($transaction);
        $this->transactionRepo->createTransaction($transaction);
    }

    public function authorize()
    {
        // call authorizer
        // update status
        // upadte transaction in db
        // trigger event update
    }    

    public function update()
    {
        // check transaction approved
        // if !approved update status to canceled
        // revalidate
        // begin db transaction
        // commit db transaction
        // trigger event notification
    } 
}