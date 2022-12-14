<?php

namespace App\Domain\Listeners\Transaction;

use App\Domain\Events\Transaction\AuthorizeTransaction;
use App\Domain\Events\Transaction\UpdateTransaction;
use App\Domain\Services\Transaction\TransactionService;

class AuthorizeTransactionListener
{
    private TransactionService $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function handle(AuthorizeTransaction $event)
    {
        $transaction = $event->getTransaction();

        event(new UpdateTransaction($this->service->authorize($transaction)));
    }
}