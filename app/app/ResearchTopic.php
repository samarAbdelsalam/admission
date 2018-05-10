<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchTopic extends Model
{
    protected $table = 'research_topic';
    public $timestamps = false;

    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
