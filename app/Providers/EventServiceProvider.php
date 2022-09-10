<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Domain\Events\Transaction\CreateTransaction::class => [
            \App\Domain\Listeners\Transaction\CreateTransactionListener::class,
        ],
        \App\Domain\Events\Transaction\AuthorizeTransaction::class => [
            \App\Domain\Listeners\Transaction\AuthorizeTransactionListener::class,
        ],
    ];
}
