<?php

namespace App\Domain\Account;

use App\Domain\Account\Type\AccountTypeInterface;
use App\Domain\Account\Type\Shopkeeper;

class Account
{
    private string $uuid;
    private string $name;
    private string $document;
    private string $email;
    private string $password;
    private float  $balance;
    private AccountTypeInterface $accountType;
 
    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    public function getAccountType(): AccountTypeInterface
    {
        return $this->accountType;
    }

    public function setAccountType(AccountTypeInterface $accountType)
    {
        $this->accountType = $accountType;

        return $this;
    }

    public function isShopkeeper(): bool
    {
        return $this->accountType instanceof Shopkeeper;
    }
}