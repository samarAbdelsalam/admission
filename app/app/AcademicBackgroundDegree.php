<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicBackgroundDegree extends Model
{
    protected $table = 'academic_background_degree';
    public $timestamps = false;


    public function university(){
        return $this->belongsTo(University::class,'university','id');
    }
}
