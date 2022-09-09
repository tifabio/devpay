<?php

namespace App\Domain\Entities\Account\Type;

class Shopkeeper implements AccountTypeInterface
{
    public function getType(): string
    {
        return 'SHOPKEEPER';
    }
}