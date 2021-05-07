<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            ['id' => 1, 'cnpj' => '63140657000174', 'razao_social' => 'Empresa A'],
            ['id' => 2, 'cnpj' => '60562988000104', 'razao_social' => 'Empresa B'],
            ['id' => 3, 'cnpj' => '46500057000150', 'razao_social' => 'Empresa C'],
        ];

        foreach($companies as $company){
            Company::create($company);
        }
    }
}
