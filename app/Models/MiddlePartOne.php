<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiddlePartOne extends Model
{
    use HasFactory;
    protected $fillable=['item_name','preview','image_70x70','image_heading','image_text',];
}
