<?php

namespace App\Domain\Events\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Exceptions\Transaction\AccountNotFoundException;
use App\Infrastructure\ORM\Models\Account;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        try {
            $payer = Account::findOrFail($this->request->payer)->getEntity();
        } catch (ModelNotFoundException $e) {
            throw new AccountNotFoundException('Payer');
        }

        try {
            $payee = Account::findOrFail($this->request->payee)->getEntity();
        } catch (ModelNotFoundException $e) {
            throw new AccountNotFoundException('Payee');
        }

        $transaction = new Transaction();
        $transaction->setPayer($payer);
        $transaction->setPayee($payee);
        $transaction->setAmount($this->request->value);
        return $transaction;
    }
}
