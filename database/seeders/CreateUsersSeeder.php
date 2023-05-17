<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
               'name'=>'Admin Qolby',
               'email'=>'qolby.latifah7@gmail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('secret'),
            ],
            [
               'name'=>'Superadmin Qolby',
               'email'=>'qolbi07latifah@gmail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('secret'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
