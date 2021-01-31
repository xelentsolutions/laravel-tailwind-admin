<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentTerms;

class PaymentTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentTerms::create([
            'name'          =>  'Payment 7 days after invoice date',
            'abrv'          =>  'Net 7',
            'days'   =>  '7',
            'status'          =>  1,
        ]);
        PaymentTerms::create([
            'name'          =>  'Payment 10 days after invoice date',
            'abrv'          =>  'Net 10',
            'days'   =>  '10',
            'status'          =>  1,
        ]);
        PaymentTerms::create([
            'name'          =>  'Payment 30 days after invoice date',
            'abrv'          =>  'Net 30',
            'days'   =>  '30',
            'status'          =>  1,
        ]);
        PaymentTerms::create([
            'name'          =>  'Payment 60 days after invoice date',
            'abrv'          =>  'Net 60',
            'days'   =>  '60',
            'status'          =>  1,
        ]);
        PaymentTerms::create([
            'name'          =>  'Payment 90 days after invoice date',
            'abrv'          =>  'Net 90',
            'days'   =>  '90',
            'status'          =>  1,
        ]);
        PaymentTerms::create([
            'name'          =>  'Payment in advance',
            'abrv'          =>  'PIA',
            'days'   =>  '0',
            'status'          =>  1,
        ]);
        PaymentTerms::create([
            'name'          =>  'Cash on Delivery',
            'abrv'          =>  'COD',
            'days'   =>  '0',
            'status'          =>  1,
        ]);
        PaymentTerms::create([
            'name'          =>  'Cash next Delivery',
            'abrv'          =>  'CND',
            'days'   =>  '0',
            'status'          =>  1,
        ]);
    }
}
