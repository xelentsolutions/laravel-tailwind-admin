<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';

    protected $fillable = [
        'id', 'bill_date', 'customer_id', 'po_id', 'fare', 'remarks', 'bill_image'
    ];

    protected $casts = [
        'id'  =>  'integer',
        'customer_id'  =>  'integer',
        'po_id'  =>  'integer',
        'bill_date' => 'date'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
        //return $this->belongsTo('App\Models\Supplier');
    }

    public function billDetail()
    {
        return $this->hasMany(BillDetail::class, 'bill_id');
    }
}
