<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilitaryInfo extends Model
{
  protected $table = 'military_info';
  public $timestamps = false;

  public function application(){
      return $this->belongsTo(Application::class,'application_id','id');
  }
}
