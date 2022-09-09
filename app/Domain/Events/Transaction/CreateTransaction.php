<?php

namespace App\Domain\Events\Transaction;

use App\Domain\Entities\Account\Account;
use App\Domain\Entities\Account\Type\Shopkeeper;
use App\Domain\Entities\Transaction\Transaction;
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
        $payer = new Account();
        $payer->setAccountType(new Shopkeeper());

        $transaction = new Transaction();
        $transaction->setUuid(uniqid());
        $transaction->setPayer($payer);
        $transaction->setPayee(new Account());
        $transaction->setAmount($this->request->value);
        return $transaction;
    }
}
