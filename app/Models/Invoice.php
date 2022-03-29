<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'tax',
        'price_model',
        'price_design',
        'qty_model',
        'user_id',
        'qty_design',
        'validtill',
        'date'
    ];
}
