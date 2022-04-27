<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'hash', 'product', 'price', 'quantity', 'total', 'variants'];
    protected $casts = ['variants' => 'object'];
}
