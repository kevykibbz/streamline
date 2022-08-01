<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['product_id','category','product_name','tagname','price','rating','description','weight','dimension','color','logo','image_1000','image_768','image_600','image_300','image_150','image_100','prev_price',];
}
