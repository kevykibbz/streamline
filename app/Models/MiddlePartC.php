<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiddlePartC extends Model
{
    use HasFactory;
    protected $fillable=['item_name','preview','small_heading','big_heading','text',];
}
