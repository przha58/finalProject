<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    protected $fillable=['fullName','email','scientificTitle','certificate','dep_id'];

    public function department()
    {
        return $this->belongsTo(departments::class, 'dep_id');
    }


   
}
