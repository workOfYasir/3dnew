<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perposal extends Model
{
    use HasFactory;
    protected $fillable = [
         'date', 'validtill', 'qty_design', 'user_id', 'order_id', 'deliverable_design', 'deliverable_model', 'image', 'address', 'concept_design', 'manufacturing', 'qty_model', 'price_design', 'price_model', 'tax', 'created_at', 'updated_at', 'assigned', 'status', 'comments', 'phone', 'country', 'zip_code', 'city', 'state', 'subject'
    ];
}
