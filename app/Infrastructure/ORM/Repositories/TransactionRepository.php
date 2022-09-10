<?php

namespace App\Infrastructure\ORM\Repositories;

use App\Domain\Entities\Transaction\Transaction;
use App\Infrastructure\ORM\Models\Transaction as Model;

class TransactionRepository
{
    public function createTransaction(Transaction $transaction)
    {
        return Model::create([
            'payer_id' => $transaction->getPayer()->getUid(),
            'payee_id' => $transaction->getPayee()->getUid(),
            'amount' => $transaction->getAmount(),
            'transaction_status' => $transaction->getTransactionStatus()->getType()
        ]);
    }

    public function cancelTransaction(Transaction $transaction)
    {
        return Model::where('id', $transaction->getUid())
                    ->update([
                        'transaction_status' => $transaction->getTransactionStatus()->getType()
                    ]);
    }
}