<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiddlePartB extends Model
{
    use HasFactory;
    protected $fillable=['item_name','preview','image_heading','image_text','video_link',];
}
