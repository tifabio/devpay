<?php

namespace App\Domain\Services\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Entities\Transaction\Status\Approved;
use App\Domain\Entities\Transaction\Status\Canceled;
use App\Domain\Entities\Transaction\Status\Pending;
use App\Domain\Services\Transaction\Validator\TransactionValidatorServiceInterface;
use App\Domain\Services\Vendor\Authorizer\AuthorizerServiceInterface;
use App\Infrastructure\ORM\Repositories\TransactionRepository;
use Exception;

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

        if($this->authorizerService->isAuthorized($transaction)) {
            $transaction->setTransactionStatus(new Approved());
        }

        return $transaction;
    }    

    public function update(Transaction $transaction)
    {
        if(!$transaction->isApproved()) {
            $transaction->setTransactionStatus(new Canceled());
            return $this->transactionRepo->cancelTransaction($transaction);
        }
        
        // Revalidate if payer has balance
        try {
            $this->validatorService->validate($transaction);
        } catch (Exception $e) {
            $transaction->setTransactionStatus(new Canceled());
            return $this->transactionRepo->cancelTransaction($transaction);
        }

        return $this->transactionRepo->finishTransaction($transaction);
    } 
}