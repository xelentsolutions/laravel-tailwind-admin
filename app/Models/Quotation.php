<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $table = 'quotations';
    protected $fillable = [
        'quote_date', 'customer_id','contact_id','remarks'
    ];

    protected $casts = [
        'customer_id'      =>  'integer',
        'contact_id'   =>  'integer',
        'quote_date'   =>  'date'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function quotationDetail()
    {
        return $this->hasMany(QuotationDetail::class, 'quote_id');
    }
}
