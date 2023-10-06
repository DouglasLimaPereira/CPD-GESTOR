<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Funcao;
use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567890'),
        ]);
        Funcao::create([
            'nome' => 'Auxiliar de CPD',
            'descricao' => 'tecnologia da computacao',
        ]);
        Funcionario::create([
            'user_id' => 1,
            'funcao_id' => 1,
            'nome' => 'Douglas Lima',
            'matricula' => '119542',
            'telefone' => '85992274665',
            'data_admissao' => '2023-03-09',
            'situacao_admissional' => 1,
            'superadmin' => 1,
        ]);
    }
}
