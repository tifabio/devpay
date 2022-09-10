<?php

namespace App\Domain\Listeners\Transaction;

use App\Domain\Events\Transaction\AuthorizeTransaction;
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

        $this->service->authorize($transaction);
    }
}