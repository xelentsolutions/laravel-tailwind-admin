<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryDetail extends Model
{
    use HasFactory;

    protected $table = 'delivery_details';

    protected $fillable = [
        'id', 'dc_id', 'product_id', 'qty', 'notes'
    ];

    protected $casts = [
        'id'  =>  'integer',
        'product_id'  =>  'integer',
        'dc_id'  =>  'integer'

    ];

    public function deliveryChallan()
    {
        return $this->belongsTo(DeliveryChallan::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
}
