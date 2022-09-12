<?php

namespace App\Domain\Listeners\Transaction;

use App\Domain\Events\Transaction\UpdateTransaction;
use App\Domain\Services\Transaction\TransactionService;
use App\Domain\Entities\Transaction\Status\Finished;

class UpdateTransactionListener
{
    private TransactionService $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function handle(UpdateTransaction $event)
    {
        $transaction = $event->getTransaction();

        $updateTransaction = $this->service->update($transaction);
        
        if($updateTransaction->getTransactionStatus() instanceof Finished) {
            event(new SendNotification($transaction));
        }
    }
}