<?php

namespace Database\Seeders;
use App\Models\City;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name'          =>  'Faisalabad',
            'abrv'   =>  'FSD',
            'status'          =>  1,
        ]);
    }
}
