<?php

namespace App\Domain\Services\Vendor\Notifier;

use App\Domain\Entities\Notification\Notification;
use Illuminate\Support\Facades\Http;

class MockyNotifierService implements NotifierServiceInterface
{
    public function sendNotification(Notification $notification): bool
    {
        $response = Http::get(env('NOTIFIER_URL'));
        return isset($response['message']) && $response['message'] === 'Success';
    }
}