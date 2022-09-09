<?php

namespace Tests\Feature\Transaction\Validator;

use App\Domain\Entities\Account\Account;
use App\Domain\Entities\Account\Type\Shopkeeper;
use App\Domain\Entities\Transaction\Transaction;
use App\Domain\Exceptions\Transaction\InvalidPayerAccountException;
use App\Domain\Services\Transaction\Validator\TransactionValidatorService;
use Tests\TestCase;

class TransactionValidatorServiceTest extends TestCase
{
    public function testInvalidatePayerAccountType()
    {
        $this->expectException(InvalidPayerAccountException::class);

        $payer = new Account();
        $payer->setAccountType(new Shopkeeper());

        $transaction = new Transaction();
        $transaction->setPayer($payer);

        $validatorService = new TransactionValidatorService();
        $validatorService->validate($transaction);
    }
}
