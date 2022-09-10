<?php

namespace App\Domain\Events\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use Illuminate\Queue\SerializesModels;

class AuthorizeTransaction
{
    use SerializesModels;

    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }
}
