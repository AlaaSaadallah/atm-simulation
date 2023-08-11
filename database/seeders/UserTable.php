<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'first_name' => 'Alaa',
            'last_name' => 'Ali',
            'phone' => '01147718188',
            'address' => 'cairo',
            'email' => 'alaa.saadallah96@gmail.com',
            'card_number' => '12345678912345',
            'pin' => '123456',
            'is_blocked' => false
        ]);
        User::create([
            'first_name' => 'test',
            'last_name' => 'user',
            'phone' => '01111111111',
            'address' => 'cairo',
            'email' => 'test.user@gmail.com',
            'card_number' => '12345678912355',
            'pin' => '123457',
            'is_blocked' => true
        ]);
    }
}
