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
        $user = ['id' => 1, 'name' => 'Adolpho Cavalcanti', 'email' => 'adolpho@terra.com.br', 'password' => bcrypt('docker@1212')];

        User::create($user);
    }
}
