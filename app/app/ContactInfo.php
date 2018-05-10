<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = "contact_info";
    public $timestamps = false;


    public function country(){
        return $this->belongsTo(Country::class,'country_Code','id');
    }

    public function city(){
        return $this->belongsTo(City::class,'city_Id','id');
    }

    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
         
    }
}
