<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialSource extends Model
{
    protected $table = 'financial_source';
    public $timestamps = false;

    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
    }
}
