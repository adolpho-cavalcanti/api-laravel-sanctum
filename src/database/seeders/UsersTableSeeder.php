<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Jorge da Silva', 'email' => 'jorge@terra.com.br', 'cpf' => '92692654048', 'nascimento' => '1980-08-03', 'password' => bcrypt('docker@1212'), 'company_id' => 3],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
