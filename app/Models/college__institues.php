<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class college__institues extends Model
{
    use HasFactory;
    protected $fillable=['name','type','DeanName','DeanEmail','address','gps_lon','gps_lat'];
}
