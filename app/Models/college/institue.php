<?php

namespace App\Models\college;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class institue extends Model
{
    use HasFactory;
    protected $fillable=['name','type','DeanName','DeanEmail','address','gps_lon','gps_lat'];
}


