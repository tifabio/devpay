<?php

namespace App\Domain\Account\Type;

interface AccountTypeInterface
{
    public function getType(): string;    
}