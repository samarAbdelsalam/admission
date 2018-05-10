<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicBackgroundDegree extends Model
{
    protected $table = 'academic_bagckground_degree';
    public $timestamps = false;

    public function academicBagckground(){
        return $this->belongsTo(AcademicBackground::class,'academic_bagckground_id','id');
    }

    public function university(){
        return $this->belongsTo(University::class,'university_id','id');
    }
}
