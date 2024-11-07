<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
            'name'=>'user2',
            'email'=>'user2@gmail.com',
            'password'=>'123456',
            'level'=>'0',
            'id_user'=>'sgh02'
        ]);
    }
}
