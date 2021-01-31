<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'bill_details';
    protected $fillable = [
        'bill_id', 'product_id', 'quantity', 'rate', 'notes'
    ];

    protected $casts = [
        'product_id'      =>  'integer',
        'bill_id'   =>  'integer',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
}
