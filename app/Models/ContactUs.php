<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['location_name','location_map','heading','subheading','body_text','phone','address','email'];
}
