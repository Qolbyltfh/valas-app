<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Memberships;

class CreateMembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nama_membership'=>'None',
                'diskon'=>0,
                'min_profit'=>0,
            ],
            [
               'nama_membership'=>'Bronze',
               'diskon'=>5,
               'min_profit'=>1000,
            ],
            [
                'nama_membership'=>'Silver',
                'diskon'=>7,
                'min_profit'=>5000,
             ],
             [
                'nama_membership'=>'Gold',
                'diskon'=>10,
                'min_profit'=>10000,
             ],
        ];
  
        foreach ($user as $key => $value) {
            Memberships::create($value);
        }
    }
}
