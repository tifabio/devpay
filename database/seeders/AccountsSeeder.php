<?php

namespace Database\Seeders;

use App\Infrastructure\ORM\Models\Account;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('pt_BR');

        $model = app(Account::class);

        $model->create([
            'name' => $faker->name,
            'document' => $faker->cpf,
            'email' => $faker->email,
            'password' => md5($faker->password),
            'balance' => 200,
            'account_type' => 'CUSTOMER'
        ]);

        $model->create([
            'name' => $faker->name,
            'document' => $faker->cnpj,
            'email' => $faker->email,
            'password' => md5($faker->password),
            'balance' => 0,
            'account_type' => 'SHOPKEEPER'
        ]);
    }
}
