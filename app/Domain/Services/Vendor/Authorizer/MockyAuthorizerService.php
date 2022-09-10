<?php

namespace App\Domain\Services\Vendor\Authorizer;

use App\Domain\Entities\Transaction\Transaction;
use Illuminate\Support\Facades\Http;

class MockyAuthorizerService implements AuthorizerServiceInterface
{
    public function isAuthorized(Transaction $transaction): bool
    {
        $response = Http::get(env('AUTHORIZER_URL'));
        return isset($response['message']) && $response['message'] === 'Autorizado';
    }
}