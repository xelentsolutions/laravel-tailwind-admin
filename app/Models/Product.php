<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name', 'sku','min_stock','remarks','product_image','op_qty','op_date','uom_id'
    ];

    protected $casts = [
        'uom_id'      =>  'integer',
        'min_stock'   =>  'integer',
        'status'      =>  'boolean',
    ];
}
