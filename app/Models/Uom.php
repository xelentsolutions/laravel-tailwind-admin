<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uom extends Model
{
    use HasFactory;
    protected $table = 'uoms';
    protected $fillable = [
        'name', 'status'
    ];

    protected $casts = [
        'status'      =>  'boolean'
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
