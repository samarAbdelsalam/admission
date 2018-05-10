<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicBackground extends Model
{
    protected $table = 'academic_background';
    public $timestamps = false;

    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
    }

    public function academicBackgroundDegree(){
        return $this->hasMany(AcademicBackgroundDegree::class);
    }
}
