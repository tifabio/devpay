<?php

namespace App\Domain\Account\Type;

class Customer implements AccountTypeInterface
{
    public function getType(): string
    {
        return 'CUSTOMER';
    }
}