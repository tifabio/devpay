<?php

namespace App\Domain\Listeners\Transaction;

use App\Domain\Events\Transaction\UpdateTransaction;
use App\Domain\Services\Transaction\TransactionService;

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

        $a = $this->service->update($transaction);
        
        dd($a);
    }
}