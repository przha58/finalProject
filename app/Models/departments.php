<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    use HasFactory;
    
    protected $table = 'departments';
    protected $fillable=['name','HeadName','HeadEmail','college_id'];

    public function college()
    {
        return $this->belongsTo(college__institues::class, 'college_id');
    }
}
