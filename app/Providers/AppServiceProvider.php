<?php

namespace App\Providers;

use App\Domain\Services\Transaction\TransactionService;
use App\Domain\Services\Transaction\Validator\TransactionValidatorService;
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
        $this->app->bind('App\Domain\Services\Transaction\TransactionService', function () {
            $validatorService = new TransactionValidatorService();
            $transactionRepository = new TransactionRepository();
            return new TransactionService($validatorService, $transactionRepository);
        });
    }
}
