<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    protected $fillable = [
        'id', 'po_date', 'customer_id', 'pt_id', 'bill_no', 'remarks', 'po_image'
    ];

    protected $casts = [
        'id'  =>  'integer',
        'customer_id'  =>  'integer',
        'pt_id'  =>  'integer'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
        //return $this->belongsTo('App\Models\Supplier');
    }

    public function pt()
    {
        //return $this->belongsTo('App\Models\PaymentTerm');
        return $this->belongsTo(PaymentTerm::class);
    }

    public function purchaseDetail()
    {
        return $this->hasMany(PurchaseDetail::class, 'po_id');
    }
}
