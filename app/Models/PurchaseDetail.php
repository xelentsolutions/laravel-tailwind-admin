<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $table = 'purchase_details';

    protected $fillable = [
        'id', 'po_id', 'product_id', 'qty', 'rate', 'amount', 'notes'
    ];

    protected $casts = [
        'id'  =>  'integer',
        'product_id'  =>  'integer',
        'po_id'  =>  'integer'

    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
}
