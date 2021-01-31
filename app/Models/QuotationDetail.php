<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;

    protected $table = 'quotation_details';
    protected $fillable = [
        'quote_id', 'product_id','quantity','rate','gross_total','total_amount','notes'
    ];

    protected $casts = [
        'product_id'      =>  'integer',
        'quote_id'   =>  'integer',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
}
