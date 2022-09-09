<?php

namespace App\Domain\Exceptions\Transaction;

use Exception;
use Illuminate\Http\Response;

class AccountNotFoundException extends Exception
{
    public function render(): Response
    {
        $status = 400;
        $error = sprintf("%s Account Not Found", $this->getMessage());

        return response(["error" => $error], $status);
    }
}