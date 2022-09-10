<?php

namespace App\Domain\Services\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Entities\Transaction\Status\Approved;
use App\Domain\Entities\Transaction\Status\Canceled;
use App\Domain\Entities\Transaction\Status\Pending;
use App\Domain\Services\Transaction\Validator\TransactionValidatorServiceInterface;
use App\Domain\Services\Vendor\Authorizer\AuthorizerServiceInterface;
use App\Infrastructure\ORM\Repositories\TransactionRepository;

class TransactionService
{
    private TransactionValidatorServiceInterface $validatorService;
    private AuthorizerServiceInterface $authorizerService;
    private TransactionRepository $transactionRepo;

    public function __construct(
        TransactionValidatorServiceInterface $validatorService,
        AuthorizerServiceInterface $authorizerService,
        TransactionRepository $transactionRepo
    ) {
        $this->validatorService = $validatorService;
        $this->authorizerService = $authorizerService;
        $this->transactionRepo = $transactionRepo;
    }

    public function create(Transaction $transaction)
    {
        $this->validatorService->validate($transaction);
        $transaction->setTransactionStatus(new Pending());
        return $this->transactionRepo->createTransaction($transaction);
    }

    public function authorize(Transaction $transaction)
    {
        $transaction->setTransactionStatus(new Canceled());

        $transactionAuthorized = $this->authorizerService->isAuthorized($transaction);
        if($transactionAuthorized) {
            $transaction->setTransactionStatus(new Approved());
        }

        return $transaction;
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