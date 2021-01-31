<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Uom;
class UomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UOM::create([
            'name'          =>  'No',
            'status'          =>  1,
        ]);
        UOM::create([
            'name'          =>  'Feet',
            'status'          =>  1,
        ]);
        UOM::create([
            'name'          =>  'KG',
            'status'          =>  1,
        ]);
    }
}
