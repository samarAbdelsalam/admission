<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';
    public $timestamps = false;

    public function major(){
        return $this->belongsTo(Major::class,'major_id','id');
    }
}
