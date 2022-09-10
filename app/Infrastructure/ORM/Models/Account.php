<?php

namespace App\Infrastructure\ORM\Models;

use App\Domain\Entities\Account\Account as Entity;
use App\Domain\Entities\Account\Type\Customer;
use App\Domain\Entities\Account\Type\Shopkeeper;
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

    public function getEntity()
    {
        $entity = new Entity();
        $entity->setUid($this->id);
        $entity->setName($this->name);
        $entity->setDocument($this->document);
        $entity->setEmail($this->email);
        $entity->setBalance($this->balance);
        $entity->setAccountType($this->getAccountType());
        return $entity;
    }

    private function getAccountType()
    {
        if($this->account_type == 'SHOPKEEPER') {
            return new Shopkeeper();
        }

        return new Customer();
    }
}