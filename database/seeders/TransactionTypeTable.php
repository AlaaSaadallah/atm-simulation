<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTypeTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TransactionType::create([
            'name' => 'deposit',
        ]);
        
        TransactionType::create([
            'name' => 'withdraw',
        ]);
    }
}
