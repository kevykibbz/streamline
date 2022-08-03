<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;
    protected $fillable=['slider_100x50','slider_1920x950','heading_strong','heading_plain','text','item_name','preview',];
}
