<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConstants extends Model
{
    use HasFactory;
    protected $fillable=['site_name','email','email_two','theme_color','site_url','site_descreption','site_keywords','site_address','site_location','working_days','working_hours','working_hours','closed_days','special_days','special_hours','facebook','twitter','instagram','whatsapp','linkedin','youtube','github','favicon','icon_180','icon_16','icon_32','phone','phone_two'];
}
