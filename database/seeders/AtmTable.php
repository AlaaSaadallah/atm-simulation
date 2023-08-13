<?php

namespace Database\Seeders;

use App\Models\Atm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtmTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Atm::factory(5)->create();
    }
}
