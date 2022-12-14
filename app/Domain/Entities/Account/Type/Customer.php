<?php

namespace App\Domain\Entities\Account\Type;

class Customer implements AccountTypeInterface
{
    public function getType(): string
    {
        return 'CUSTOMER';
    }
}