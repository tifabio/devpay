<?php

namespace App\Domain\Services\Vendor\Authorizer;

use App\Domain\Entities\Transaction\Transaction;

interface AuthorizerServiceInterface
{
    public function isAuthorized(Transaction $transaction): bool;
}