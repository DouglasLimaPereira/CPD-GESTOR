<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Superadmin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567890'),
            'superadmin' => true,
            'telefone' => '85988857434',
        ]);
    }
}
