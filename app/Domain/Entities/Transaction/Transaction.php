<?php

namespace App\Domain\Entities\Transaction;

use App\Domain\Entities\Account\Account;
use App\Domain\Entities\Transaction\Status\TransactionStatusInterface;
use App\Domain\Entities\Transaction\Status\Approved;

class Transaction
{
    private int $uid;
    private Account $payer;
    private Account $payee;
    private float $amount;
    private TransactionStatusInterface $transactionStatus;

    public function getUid(): int
    {
        return $this->uid;
    }

    public function setUid(int $uid)
    {
        $this->uid = $uid;
    }

    public function getPayer(): Account
    {
        return $this->payer;
    }

    public function setPayer(Account $payer)
    {
        $this->payer = $payer;
    }

    public function getPayee(): Account
    {
        return $this->payee;
    }

    public function setPayee(Account $payee)
    {
        $this->payee = $payee;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount)
    {
        $this->amount = $amount;
    }

    public function getTransactionStatus(): TransactionStatusInterface
    {
        return $this->transactionStatus;
    }

    public function setTransactionStatus(TransactionStatusInterface $transactionStatus)
    {
        $this->transactionStatus = $transactionStatus;
    }

    public function isApproved(): bool
    {
        return $this->transactionStatus instanceof Approved;
    }

    public function getNotificationContent()
    {
        return "{$this->payer->getName()} sent you {$this->getAmount()}";
    }   
}