<?php

namespace App\Domain\Exceptions\Transaction;

use Exception;
use Illuminate\Http\Response;

class InsufficientBalanceException extends Exception {}