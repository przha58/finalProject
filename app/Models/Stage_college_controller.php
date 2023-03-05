<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage_college_controller extends Model
{
    use HasFactory;
    protected $table = 'stages';
    protected $fillable=['Stagename','StageNumber','dep_id'];

    public function department()
    {
        return $this->belongsTo(departments::class, 'dep_id');
    }
}
