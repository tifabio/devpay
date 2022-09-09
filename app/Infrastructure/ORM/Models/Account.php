<?php

namespace App\Infrastructure\ORM\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name',
        'document',
        'email',
        'password',
        'balance',
        'account_type'
    ];
}