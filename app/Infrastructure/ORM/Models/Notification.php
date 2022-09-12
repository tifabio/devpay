<?php

namespace App\Infrastructure\ORM\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'content',
        'notification_status'
    ];
}