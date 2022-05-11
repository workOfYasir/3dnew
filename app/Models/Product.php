<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'address', 'color','user_id', 'description', 'software_used', 'printing_technology', 'size', 
    ];
    public function gallery()
    {
        return $this->hasMany(Gallery::class,'product_id','id');
            
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');     
    }
}
