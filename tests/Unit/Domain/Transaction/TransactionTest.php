<?php

namespace Tests\Unit\Domain\Transaction;

use App\Domain\Entities\Account\Account;
use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Entities\Transaction\Status\Pending;
use Tests\TestCase;
use Faker\Factory as Faker;

class TransactionTest extends TestCase
{
    public function testTransactionAttributes()
    {
        $faker = Faker::create('pt_BR');

        $payer = new Account();
        $payee = new Account();
        $amout = $faker->randomDigit;
        $transactionStatus = new Pending();

        $transaction = new Transaction();
        $transaction->setPayer($payer);
        $transaction->setPayee($payee);
        $transaction->setAmount($amout);
        $transaction->setTransactionStatus($transactionStatus);

        $this->assertEquals($payer, $transaction->getPayer());
        $this->assertEquals($payee, $transaction->getPayee());
        $this->assertEquals($amout, $transaction->getAmount());
        $this->assertEquals($transactionStatus, $transaction->getTransactionStatus());
    }
}
