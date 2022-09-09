<?php

namespace App\Domain\Exceptions\Transaction;

use Exception;
use Illuminate\Http\Response;

class InsufficientBalanceException extends Exception
{
    public function render(): Response
    {
        $status = 400;
        $error = "Payer Account Insufficient Balance";

        return response(["error" => $error], $status);
    }
}