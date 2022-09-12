<?php

namespace App\Infrastructure\ORM\Repositories;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Entities\Transaction\Status\Finished;
use App\Infrastructure\ORM\Models\Transaction as Model;
use App\Infrastructure\ORM\Models\Account as AccountModel;
use Illuminate\Support\Facades\DB;

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
        Model::where('id', $transaction->getUid())
            ->update([
                'transaction_status' => $transaction->getTransactionStatus()->getType()
            ]);

        return $transaction;
    }

    public function finishTransaction(Transaction $transaction)
    {
        DB::transaction(function () use ($transaction) {
            $payer = $transaction->getPayer();
            $payee = $transaction->getPayee();

            AccountModel::where('id', $payer->getUid())
                ->update([
                    'balance' => $payer->getBalance() - $transaction->getAmount()
                ]);

            AccountModel::where('id', $payee->getUid())
                ->update([
                    'balance' => $payee->getBalance() + $transaction->getAmount()
                ]);

            $transaction->setTransactionStatus(new Finished());

            Model::where('id', $transaction->getUid())
                ->update([
                    'transaction_status' => $transaction->getTransactionStatus()->getType()
                ]);
        });

        return $transaction;
    }
}