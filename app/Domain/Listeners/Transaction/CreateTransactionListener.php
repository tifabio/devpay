<?php

namespace App\Domain\Listeners\Transaction;

use App\Domain\Events\Transaction\CreateTransaction;
use App\Domain\Services\Transaction\TransactionService;

class CreateTransactionListener
{
    private TransactionService $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function handle(CreateTransaction $event)
    {
        return $this->service->create($event->getTransaction());
    }
}