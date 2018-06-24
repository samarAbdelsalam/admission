<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnglishTest extends Model
{
    protected $table = 'english_test';
    public $timestamps = false;

    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
    }

//    public function academicBackgroundDegree(){
//        return $this->hasMany(AcademicBackgroundDegree::class);
//    }
}
