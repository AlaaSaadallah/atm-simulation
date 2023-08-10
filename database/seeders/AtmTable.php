<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtmTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return collect([
            (object) [
                'name' => '',
                'address' => '',
                'is_deposital' => '',
            ],

        ]);
    }
}
