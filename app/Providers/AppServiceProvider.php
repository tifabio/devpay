<?php

namespace App\Providers;

use App\Domain\Services\Notification\NotificationService;
use App\Domain\Services\Transaction\TransactionService;
use App\Domain\Services\Transaction\Validator\TransactionValidatorService;
use App\Domain\Services\Vendor\Authorizer\MockyAuthorizerService;
use App\Domain\Services\Vendor\Notifier\MockyNotifierService;
use App\Infrastructure\ORM\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionService::class, function () {
            $validatorService = new TransactionValidatorService();
            $authorizerService = new MockyAuthorizerService();
            $transactionRepository = new TransactionRepository();

            return new TransactionService(
                $validatorService, 
                $authorizerService, 
                $transactionRepository
            );
        });
        $this->app->bind(NotificationService::class, function () {
            $notifierService = new MockyNotifierService();

            return new NotificationService(
                $notifierService, 
            );
        });
    }
}
