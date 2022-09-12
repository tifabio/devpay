<?php

namespace App\Domain\Events\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Infrastructure\ORM\Models\Account;
use Illuminate\Queue\SerializesModels;

class UpdateTransaction
{
    use SerializesModels;

    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getTransaction(): Transaction
    {
        // Retrieve payer/payee updated db data
        $payer = Account::find($this->transaction->getPayer()->getUid())->getEntity();
        $payee = Account::find($this->transaction->getPayee()->getUid())->getEntity();
        $this->transaction->setPayer($payer);
        $this->transaction->setPayee($payee);
        return $this->transaction;
    }
}
