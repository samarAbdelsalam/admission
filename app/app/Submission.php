<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = "submission";
    public $timestamps = false;

    public function application(){
        return $this->hasMany(Application::Class);
      }
}
