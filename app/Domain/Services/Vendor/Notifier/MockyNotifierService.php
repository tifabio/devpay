<?php

namespace App\Domain\Services\Vendor\Notifier;

use App\Domain\Entities\Transaction\Transaction;
use Illuminate\Support\Facades\Http;

class MockyNotifierService implements NotifierServiceInterface
{
    public function sendNotification(): bool
    {
        $response = Http::get(env('NOTIFIER_URL'));
        return isset($response['message']) && $response['message'] === 'Success';
    }
}