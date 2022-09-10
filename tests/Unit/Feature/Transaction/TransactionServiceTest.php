<?php

namespace Tests\Feature\Transaction;

use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Services\Transaction\TransactionService;
use App\Domain\Entities\Transaction\Status\Pending;
use App\Infrastructure\ORM\Models\Account;
use App\Infrastructure\ORM\Models\Transaction as TransactionModel;
use Faker\Factory as Faker;
use Tests\TestCase;

class TransactionServiceTest extends TestCase
{   
    private TransactionService $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = app(TransactionService::class);
    }

    public function testCreateTransaction()
    {
        $transaction = $this->mockTransaction();
        $createTransaction = $this->service->create($transaction);
        $this->assertTrue($createTransaction instanceof TransactionModel);
    }

    public function testAuthorizeTransaction()
    {
        $transaction = $this->mockTransaction();
        $createTransaction = $this->service->authorize($transaction);
        $this->assertTrue($createTransaction instanceof Transaction);
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
            'balance' => 200,
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

        $amount = $faker->numberBetween(50, 200);

        $transaction = new Transaction();
        $transaction->setPayer($payer);
        $transaction->setPayee($payee);
        $transaction->setAmount($amount);
        $transaction->setTransactionStatus(new Pending());

        return $transaction;
    }
}