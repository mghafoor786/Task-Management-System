<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name'=>'Muhammad',
            'last_name'=>'ghafoor',
            'username'=>'mghafoor',
            'role'=>'1',
            'email'=>'admin@gmail.com',
            'password'=>'admin'
        ]);
    }
}
