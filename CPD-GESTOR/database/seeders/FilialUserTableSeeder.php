<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filial;

class FilialUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filial = Filial::first();
        $filial->usuarios()->attach([
            'filial_id' => 1,
            'user_id' => 1,
            'superadmin' => 1
        ]);
    }
}
