<?php

namespace App\Domain\Events\Transaction;

use App\Infrastructure\ORM\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class CreateTransaction
{
    use SerializesModels;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getTransaction(): Transaction
    {
        $payer = Account::findOrFail($this->request->payer)->getEntity();
        $payee = Account::findOrFail($this->request->payee)->getEntity();
        $amount = $this->request->value;

        $transaction = new Transaction();
        $transaction->setPayer($payer);
        $transaction->setPayee($payee);
        $transaction->setAmount($amount);
        return $transaction;
    }
}
