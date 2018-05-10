<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "country";
    public $timestamps = false;


    public function city(){
      return $this->hasMany(City::Class);
    }
}
