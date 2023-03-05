<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class module extends Model
{
    use HasFactory;
    

    protected $table = 'lectures';
    protected $fillable= ['name', 'stage_id', 'staff_id','info','academicYear','ECTS'];


    public function stage()
    { 
  
        
        return $this->belongsTo(Stage_college_controller::class, 'stage_id');
       
    }
    
    public function staff()
    { 
  
        return $this->belongsTo(staff::class, 'staff_id');
      
       
    }
}
