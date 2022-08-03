<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;
    protected $fillable=['image_175x51','image_494x702','item_name','preview','small_heading','title','big_heading','text',];
}
