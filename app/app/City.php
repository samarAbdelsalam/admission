<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "city";
    public $timestamps = false;


    public function country(){
      return $this->belongsTo(Country::Class,'country_Code','id');
    }
}
