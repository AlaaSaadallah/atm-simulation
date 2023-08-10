<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionTypeTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return collect([
            (object) [
                'name' => 'deposit',
            ],
            (object) [
                'name' => 'withdraw',
            ],
        ]);
    }
}
