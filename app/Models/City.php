<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'name', 'abrv','status'
    ];

    protected $casts = [
        'status'      =>  'boolean'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
