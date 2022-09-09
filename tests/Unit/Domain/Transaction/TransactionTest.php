<?php

namespace Tests\Unit\Domain\Transaction;

use App\Domain\Account\Account;
use App\Domain\Transaction\Transaction;
use App\Domain\Transaction\Status\Pending;
use Tests\TestCase;
use Faker\Factory as Faker;

class TransactionTest extends TestCase
{
    public function testTransactionAttributes()
    {
        $faker = Faker::create('pt_BR');

        $uuid = $faker->uuid;
        $payer = new Account();
        $payee = new Account();
        $amout = $faker->randomDigit;
        $transactionStatus = new Pending();

        $transaction = new Transaction();
        $transaction->setUuid($uuid);
        $transaction->setPayer($payer);
        $transaction->setPayee($payee);
        $transaction->setAmount($amout);
        $transaction->setTransactionStatus($transactionStatus);

        $this->assertEquals($uuid, $transaction->getUuid());
        $this->assertEquals($payer, $transaction->getPayer());
        $this->assertEquals($payee, $transaction->getPayee());
        $this->assertEquals($amout, $transaction->getAmount());
        $this->assertEquals($transactionStatus, $transaction->getTransactionStatus());
    }
}
