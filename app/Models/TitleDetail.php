<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'p_id',
        'title',
    ];
}
