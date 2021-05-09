<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $participants = [
            ['id' => 1, 'name' => 'Lionel Messi', 'email' => 'lionel.messi@terra.com.br', 'cpf' => '92692654048', 'nascimento' => '1987-06-24', 'company_id' => 3],
            ['id' => 2, 'name' => 'Cristiano Ronaldo', 'email' => 'cristiano.ronaldo@terra.com.br', 'cpf' => '92867726026', 'nascimento' => '1985-02-05', 'company_id' => 1],
            ['id' => 3, 'name' => 'Andrés Iniesta', 'email' => 'andres.iniesta@terra.com.br', 'cpf' => '68677400060', 'nascimento' => '1984-05-11', 'company_id' => 3],
            ['id' => 4, 'name' => 'Sérgio Ramos', 'email' => 'sergio.ramos@terra.com.br', 'cpf' => '92856612032', 'nascimento' => '1986-03-30', 'company_id' => 2],
        ];

        foreach($participants as $participant){
            Participant::create($participant);
        }
    }
}
