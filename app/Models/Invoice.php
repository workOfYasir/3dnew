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
        'order_id',
        'qty_design',
        'validtill',
        'address',
        'concept_design',
        'manufacturing',
        'deliverable_design',
        'deliverable_model',
        'image',
        'date'
    ];
}
