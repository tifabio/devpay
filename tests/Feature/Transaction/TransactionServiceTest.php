<?php

namespace Tests\Feature\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Services\Transaction\TransactionService;
use App\Domain\Entities\Transaction\Status\Approved;
use App\Domain\Entities\Transaction\Status\Canceled;
use App\Domain\Entities\Transaction\Status\Finished;
use App\Domain\Entities\Transaction\Status\Pending;
use App\Infrastructure\ORM\Models\Account;
use App\Infrastructure\ORM\Models\Transaction as TransactionModel;
use Faker\Factory as Faker;
use Tests\TestCase;

class TransactionServiceTest extends TestCase
{   
    private TransactionService $service;
    private int $payerInitBalance;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = app(TransactionService::class);
        $this->payerInitBalance = 200;
    }

    public function testCreateTransaction(): void
    {
        $transaction = $this->mockTransaction();
        $createTransaction = $this->service->create($transaction);
        $this->assertTrue($createTransaction instanceof TransactionModel);
    }

    public function testAuthorizeTransaction(): void
    {
        $transaction = $this->mockTransaction();
        $authorizeTransaction = $this->service->authorize($transaction);
        $this->assertTrue($authorizeTransaction->getTransactionStatus() instanceof Approved);
    }

    public function testFinishTransaction(): void
    {
        $transaction = $this->mockTransaction();
        $createTransaction = $this->service->create($transaction);
        $transaction->setUid($createTransaction->id);
        $authorizeTransaction = $this->service->authorize($transaction);
        $updateTransaction = $this->service->update($authorizeTransaction);

        $payer = Account::find($transaction->getPayer()->getUid())->getEntity();
        $payee = Account::find($transaction->getPayee()->getUid())->getEntity();

        $this->assertTrue($updateTransaction->getTransactionStatus() instanceof Finished);
        $this->assertTrue($payer->getBalance() == $this->payerInitBalance - $transaction->getAmount());
        $this->assertTrue($payee->getBalance() == $transaction->getAmount());
    }

    public function testCancelTransaction(): void
    {
        $transaction = $this->mockTransaction();
        $createTransaction = $this->service->create($transaction);
        $transaction->setUid($createTransaction->id);
        // transaction sent to be updated without previous authorization
        $updateTransaction = $this->service->update($transaction);

        $payer = Account::find($transaction->getPayer()->getUid())->getEntity();
        $payee = Account::find($transaction->getPayee()->getUid())->getEntity();

        $this->assertTrue($updateTransaction->getTransactionStatus() instanceof Canceled);
        $this->assertTrue($payer->getBalance() == $this->payerInitBalance);
        $this->assertTrue($payee->getBalance() == 0);
    }    

    private function mockTransaction(): Transaction
    {
        $accountModel = app(Account::class);
        $faker = Faker::create('pt_BR');

        $payer = $accountModel->create([
            'name' => $faker->name,
            'document' => $faker->cpf,
            'email' => $faker->email,
            'password' => password_hash($faker->password, PASSWORD_BCRYPT),
            'balance' => $this->payerInitBalance,
            'account_type' => 'CUSTOMER'
        ])->getEntity();

        $payee = $accountModel->create([
            'name' => $faker->name,
            'document' => $faker->cnpj,
            'email' => $faker->email,
            'password' => password_hash($faker->password, PASSWORD_BCRYPT),
            'balance' => 0,
            'account_type' => 'SHOPKEEPER'
        ])->getEntity();

        $amount = $faker->numberBetween(50, $this->payerInitBalance);

        $transaction = new Transaction();
        $transaction->setPayer($payer);
        $transaction->setPayee($payee);
        $transaction->setAmount($amount);
        $transaction->setTransactionStatus(new Pending());

        return $transaction;
    }
}