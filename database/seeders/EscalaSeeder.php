<?php

namespace Database\Seeders;
use App\Models\Escala;
use Illuminate\Database\Seeder;

class EscalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $escala =[
            [
                'evento' => 'DSR',
                'data_inicio' => '2023-09-07 07:00:00',
                'data_fim' => '2023-09-07 22:00:00',
            ],
            [
                'evento' => 'FOLGA',
                'data_inicio' => '2023-09-10 07:00:00',
                'data_fim' => '2023-09-10 22:00:00',
            ],
            [
                'evento' => 'DSR',
                'data_inicio' => '2023-09-14 07:00:00',
                'data_fim' => '2023-09-14 22:00:00',
            ],
            [
                'evento' => 'DSR',
                'data_inicio' => '2023-09-21 07:00:00',
                'data_fim' => '2023-09-21 22:00:00',
            ],
            [
                'evento' => 'DSR',
                'data_inicio' => '2023-09-28 07:00:00',
                'data_fim' => '2023-09-28 22:00:00',
            ]
        ];

        foreach ($escala as $key => $value) {
            Escala::create($value);
        }
    }
}
