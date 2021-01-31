<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'name', 'phone','mobile','email','city_id','address','status'
    ];

    protected $casts = [
        'city_id'      =>  'integer',
        'status'      =>  'boolean'
    ];
}
