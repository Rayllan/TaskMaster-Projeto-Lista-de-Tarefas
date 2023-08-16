<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'firstName' => 'Rayllan',
            'lastName' => 'Christian',
            'email' => 'rayllan@teste.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
