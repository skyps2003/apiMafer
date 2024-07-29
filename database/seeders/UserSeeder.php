<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "wade",
            'surName' => "wade",
            'addres' => "wade",
            'email' => "wade@gmail.com",
            'img' => "http://127.0.0.1:8000/storage/images/logo_perfil.jpeg",
            'password' => Hash::make('12345678'),
            'gender' => 1,
        ]);
    }
}
