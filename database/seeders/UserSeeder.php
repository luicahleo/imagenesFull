<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Biblioteca Etsi',
            'email' => 'bibetsi@us.es',
            'password' => bcrypt('123456789')
        ]);
    }
}
