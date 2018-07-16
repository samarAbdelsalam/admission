<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Major;
use App\Department;
use App\ResearchTopic;

class CommonController extends Controller
{
      public function getCities()
    {
        $country_id = request('countryId');
        $cities = City::where('country_Code', '=', $country_id)->get();
        return response()->json(['cities' => $cities]);
    }
    
    public function getDepartments(){
        $major_id = request('major');
        $departments = Department::where('school_id','=',$major_id)->
                                    where('display','=',1)->get()->all();
        return response()->json(['departments' => $departments]);
    }
    
    public function getTopics(){
        $deptId = request('deptId');
      
        $topics = ResearchTopic::where('department_id','=',$deptId)->where('display','=',1)->get()->all();
       
        return response()->json(['topics' => $topics]);
        
    }
}
