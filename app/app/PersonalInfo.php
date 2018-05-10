<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $table = "personal_info";
    public $timestamps = false;

    public function nationality (){
        return $this->belongsTo(Nationality::class,'nationality_id','id');
    }

    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
    }
}
