<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $table = 'application';
  public $timestamps = false;

  public  function user(){
    return $this->belongsTo(User::Class,'users_id','id');
  }

  public function submission(){
      return $this->belongsTo(Submission::class,'submission_id','id');
  }

  public function personalInfo(){
      return $this->hasOne(PersonalInfo::Class,'application_id','id');
      }

  public function contactInfo(){
      return $this->hasOne(ContactInfo::Class,'application_id','id');
      }

  public function militaryInfo(){
      return $this->hasOne(MilitaryInfo::Class,'application_id','id');
      }

  public function reference(){
    return $this->hasOne(Reference::Class,'application_id','id');
     }

  public function academicBackground(){
  return $this->hasOne(AcademicBackground::Class,'application_id','id');
     }

  public function financialSource(){
      return $this->hasOne(FinancialSource::Class,'application_id','id');
    }

    public function academicInterest(){
        return $this->hasOne(AcademicInterest::class,'application_id','id');
    }

}
