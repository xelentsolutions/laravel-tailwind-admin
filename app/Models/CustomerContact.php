<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasFactory;
    protected $table = 'customer_contacts';
    protected $fillable = [
        'name', 'phone','mobile','email','customer_id'
    ];

    protected $casts = [
        'customer_id'      =>  'integer'
    ];
}
