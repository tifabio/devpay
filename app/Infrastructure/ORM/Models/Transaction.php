<?php

namespace App\Infrastructure\ORM\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'uuid',
        'payer_id',
        'payee_id',
        'amount',
        'transaction_status'
    ];
}