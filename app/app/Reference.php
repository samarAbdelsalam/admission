<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = "reference";
    public $timestamps = false;

    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
    }
}
