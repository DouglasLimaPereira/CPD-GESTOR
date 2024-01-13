<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Filial;

class FilialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filial = Filial::create([
            'bairro' => 'Henrique Jorge',
            'cep' => '60510260',
            'cidade' => 'Fortaleza',
            'codigo' => '506',
            'cnpj' => '1111111111',
            'logo' => '',
            'complemento' => '',
            'email' => 'mateus@grupomateus.com.br',
            'email_comercial' => 'mateus@grupomateus.com.br',
            'instagram' => 'https://www.instagram.com/grupomateusoficial/',
            'logradouro' => '',
            'nome_fantasia' => 'Mix Mateus',
            'numero' => '2100',
            'razao_social' => 'Mateus Supermercados S.A',
            'site' => 'https://www.grupomateus.com.br/',
            'telefone' => '',
            'uf' => 'CE',
        ]);

        DB::table('filial_user')->insert([
            'filial_id' => 1,
            'user_id' => 1,
            'superadmin' => 1
        ]);
    }
}
