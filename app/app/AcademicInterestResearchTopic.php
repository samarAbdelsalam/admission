<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicInterestResearchTopic extends Model
{
    protected $table = 'academic_interest_research_topic';
    public $timestamps = false;

    public function academicInterest(){
        return $this->belongsTo(AcademicInterest::class,'academic_interest_id','id');
    }

    public function researchTopic(){
        return $this->belongsTo(ResearchTopic::class,'research_topic_id','id');
    }
}
