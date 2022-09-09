<?php

namespace App\Domain\Account\Type;

class Shopkeeper implements AccountTypeInterface
{
    public function getType(): string
    {
        return 'SHOPKEEPER';
    }
}