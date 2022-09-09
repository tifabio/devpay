<?php

namespace Tests\Unit\Domain\Account\Type;

use App\Domain\Account\Type\Customer;
use App\Domain\Account\Type\Shopkeeper;
use Tests\TestCase;

class AccountTypeTest extends TestCase
{
    public function testCustomerType()
    {
        $customer = new Customer();

        $this->assertEquals($customer->getType(), 'CUSTOMER');
    }

    public function testShopkeeperType()
    {
        $shopkeeper = new Shopkeeper();

        $this->assertEquals($shopkeeper->getType(), 'SHOPKEEPER');
    }
}
