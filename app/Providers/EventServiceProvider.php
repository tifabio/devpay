<?php

namespace App\Providers;

use App\Domain\Events\Notification\CreateNotification;
use App\Domain\Events\Notification\SendNotification;
use App\Domain\Events\Transaction\CreateTransaction;
use App\Domain\Events\Transaction\AuthorizeTransaction;
use App\Domain\Events\Transaction\UpdateTransaction;
use App\Domain\Listeners\Notification\CreateNotificationListener;
use App\Domain\Listeners\Notification\SendNotificationListener;
use App\Domain\Listeners\Transaction\CreateTransactionListener;
use App\Domain\Listeners\Transaction\AuthorizeTransactionListener;
use App\Domain\Listeners\Transaction\UpdateTransactionListener;
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CreateTransaction::class => [
            CreateTransactionListener::class,
        ],
        AuthorizeTransaction::class => [
            AuthorizeTransactionListener::class,
        ],
        UpdateTransaction::class => [
            UpdateTransactionListener::class,
        ],
        CreateNotification::class => [
            CreateNotificationListener::class,
        ],
        SendNotification::class => [
            SendNotificationListener::class,
        ],
    ];
}
