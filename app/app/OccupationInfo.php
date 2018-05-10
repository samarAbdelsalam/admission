<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OccupationInfo extends Model
{
    protected $table = "occupation_info";
    public $timestamps = false;

    public function country(){
        return $this->belongsTo(Country::class,'country_Code','id');
    }

    public function city(){
        return $this->belongsTo(City::class,'city_Id','id');
    }
}
