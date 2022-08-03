<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Middle extends Model
{
    use HasFactory;
    protected $fillable=['image_420x420','text','item_name','preview',];

}
