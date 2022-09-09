<?php

namespace App\Domain\Entities\Account;

use App\Domain\Entities\Account\Type\AccountTypeInterface;
use App\Domain\Entities\Account\Type\Shopkeeper;

class Account
{
    private string $name;
    private string $document;
    private string $email;
    private string $password;
    private float  $balance;
    private AccountTypeInterface $accountType;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getDocument(): string
    {
        return $this->document;
    }

    public function setDocument(string $document)
    {
        $this->document = $document;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setBalance(float $balance)
    {
        $this->balance = $balance;
    }

    public function getAccountType(): AccountTypeInterface
    {
        return $this->accountType;
    }

    public function setAccountType(AccountTypeInterface $accountType)
    {
        $this->accountType = $accountType;
    }

    public function isShopkeeper(): bool
    {
        return $this->accountType instanceof Shopkeeper;
    }
}