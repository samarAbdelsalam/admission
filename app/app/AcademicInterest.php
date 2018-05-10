<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicInterest extends Model
{
    protected $table = 'academic_interest';
    public $timestamps = false;

    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
    }

    public function major(){
        return $this->belongsTo(Major::class,'major_id','id');
    }
}
