<?php

namespace Database\Seeders;

use App\Models\Modulo;
use App\Models\Errositef;
use Illuminate\Database\Seeder;

class ErrositefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulos = [
            'gerencia' => 'Gerência',
            'producao-propria' => 'Produção Própria',
            'producao-terceirizada' => 'Produção Terceirizada',
            'qualidade' => 'Qualidade',
            'clientes' => 'Clientes',
            'sistema' => 'Sistema',
        ];

        foreach ($modulos as $key => $value) {
            $modulo = Modulo::create([
                'nome' => $value,
                'slug' => $key,
                'descricao' => '',
                'active' => true
            ]);
        }
    }
}
 