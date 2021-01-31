<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryChallan extends Model
{
    use HasFactory;
    protected $table = 'delivery_challans';

    protected $fillable = [
        'id', 'dc_date', 'customer_id', 'po_id', 'remarks', 'dc_image'
    ];

    protected $casts = [
        'id'  =>  'integer',
        'customer_id'  =>  'integer',
        'po_id'  =>  'integer'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
        //return $this->belongsTo('App\Models\Supplier');
    }

    public function deliveryDetail()
    {
        return $this->hasMany(DeliveryDetail::class, 'dc_id');
    }
}
