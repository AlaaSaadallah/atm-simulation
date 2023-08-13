<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencyTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
            Currency::create([
                'iso_code' => 'SAR',
                'name' => 'Saudi Riyal',
                'symbol' => 'SAR',
            ]);

            Currency::create([
                'iso_code' => 'USD',
                'name' => 'American Dollar',
                'symbol' => '$',
            ]);

            Currency::create([
                'iso_code' => 'EUR',
                'name' => 'Euro',
                'symbol' => '€',
            ]);

            Currency::create([
                'iso_code' => 'EGP',
                'name' => 'Egyptian Pound',
                'symbol' => 'LE',
            ]);



    }
}
