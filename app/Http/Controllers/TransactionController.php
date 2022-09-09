<?php

namespace App\Http\Controllers;

use App\Domain\Events\Transaction\CreateTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'value' => [
                'required',
                'numeric',
                'min:0.01'
            ],
            'payer' => [
                'required',
                'int',
            ],
            'payee' => [
                'required',
                'int'         
            ],
        ]);

        event(new CreateTransaction($request));
    }
}
