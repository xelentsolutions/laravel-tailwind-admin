<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $table = 'invoice_details';
    protected $fillable = [
        'invoice_id', 'product_id', 'quantity', 'rate', 'tax_id', 'notes'
    ];

    protected $casts = [
        'product_id'      =>  'integer',
        'invoice_id'   =>  'integer',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id');
    }
}
