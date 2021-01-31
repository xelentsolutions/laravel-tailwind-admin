<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'id', 'invoice_date', 'customer_id', 'bill_id', 'remarks', 'invoice_image'
    ];

    protected $casts = [
        'id'  =>  'integer',
        'customer_id'  =>  'integer',
        'bill_id'  =>  'integer',
        'invoice_date' => 'date'

    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
        //return $this->belongsTo('App\Models\Supplier');
    }

    public function invoiceDetail()
    {
        return $this->hasMany(invoiceDetail::class, 'invoice_id');
    }
}
