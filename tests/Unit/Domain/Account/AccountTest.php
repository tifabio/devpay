<?php

namespace Tests\Unit\Domain\Account;

use App\Domain\Entities\Account\Account;
use App\Domain\Entities\Account\Type\Customer;
use App\Domain\Entities\Account\Type\Shopkeeper;
use Tests\TestCase;
use Faker\Factory as Faker;

class AccountTest extends TestCase
{
    public function testAccountAttributes()
    {
        $faker = Faker::create('pt_BR');

        $name = $faker->name;
        $document = $faker->cpf;
        $email = $faker->email;
        $password = $faker->password;
        $balance = $faker->randomDigit;
        $accountType = new Customer();

        $account = new Account();
        $account->setName($name);
        $account->setDocument($document);
        $account->setEmail($email);
        $account->setPassword($password);
        $account->setBalance($balance);
        $account->setAccountType($accountType);

        $this->assertEquals($name, $account->getName());
        $this->assertEquals($document, $account->getDocument());
        $this->assertEquals($email, $account->getEmail());
        $this->assertEquals($password, $account->getPassword());
        $this->assertEquals($balance, $account->getBalance());
        $this->assertEquals($balance, $account->getBalance());
        $this->assertEquals($accountType, $account->getAccountType());
    }

    public function testAccountIsShopkeeper()
    {
        $account = new Account();
        $account->setAccountType(new Shopkeeper());
        $this->assertTrue($account->isShopkeeper());
    }
}
