<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id',
        'product_id',
        'title_id',
        'name',
        'address',
        'amount',
        'receiver_name',
        'created_at'
    ];
}
