<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donor_product extends Model
{
    use HasFactory;
    protected $fillable=[
        'donor_id',
        'product_id',
        'amount',
        
    ];
}
