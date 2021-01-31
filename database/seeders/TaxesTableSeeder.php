<?php

namespace Database\Seeders;
use App\Models\Tax;

use Illuminate\Database\Seeder;

class TaxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tax::create([
            'name'          =>  'Sales Tax',
            'value'   =>  '17',
            'status'          =>  1,
        ]);
    }
}
