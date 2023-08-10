<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencyTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return collect([
            (object) [
                'iso_code' => 'SAR',
                'name' => 'Saudi Riyal',
                'sign' => 'SAR',
            ],
            (object) [
                'iso_code' => 'USD',
                'name' => 'American Dollar',
                'sign' => '$',
            ],
            (object) [
                'iso_code' => 'EUR',
                'name' => 'Euro',
                'sign' => '€',
            ],
            (object) [
                'iso_code' => 'EGP',
                'name' => 'Egyptian Pound',
                'sign' => 'LE',
            ],
        ]);
    }
}
