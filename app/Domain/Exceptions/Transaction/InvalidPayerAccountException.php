<?php

namespace App\Domain\Exceptions\Transaction;

use Exception;
use Illuminate\Http\Response;

class InvalidPayerAccountException extends Exception 
{
    public function render(): Response
    {
        $status = 400;
        $error = "Invalid Payer Account Type";

        return response(["error" => $error], $status);
    }
}