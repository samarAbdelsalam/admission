<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalInfo;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Validator;
use App;
use App\MilitaryInfo;

class PersonalInfoController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth');

    }
    
    public function index(){
        
 
        return view('personalInfo.personalInfo', compact('personalInfo', 'countries', 'nationlities'));
        
    }
    private function validator(array $data){
        return Validato::make($data,[
            'first_name'        => 'required|alpaha_spaces|max:30|min:3',
            'middle_name'       => 'required|alpha_spaces|max:30|min3',
            'last_name'         => 'required|alpha_spaces|max:30|min|3',
            'gender'            => 'required|alpha|max:8',
            'date_of_birth'     => 'required|date',
            'country_of_birth'  => 'required|alpha|max:2|min:2',
            'city_of_birth'     => 'required|Integer',
            'id_type'           => 'required|max:20|alpha_spaces',
            'id_number'         => 'required|alpha_num|max:50',
            'id_issue_date'     => 'required|date',
            'marital_status'    => 'required|alpha|max:20',
            'nationality'       => 'required|Integer',
            'military_number'   => 'sometimes|requires|alpha_num|max:30',
            'trible_military_number' => 'sometimes|required|alpha_num|max:30',
            'military_region' => 'sometimes|required|alpha_num|max:30',
          
            
        ]);
    }
    
    public function save(){
        
        $this->validator(request()->all())->validate();
        
        $app_id = PersonalInfoController::getAppId();
        
        $personalInfo = PersonalInfo::where('application_id','=',$app_id);
        if(is_null($personalInfo)){
            
            $personalInfo = new PersonalInfo;
            $personalInfo->application_id = $app_id;
        }
        
        $personalInfo->fname = request('first_name');
        $personalInfo->mname = request('middle_name');
        $personalInfo->last_name = request('last_name');
        $personalInfo->gender = request('gender');
        $personalInfo->date_of_birth = Carbon::createFromFormat('Y-m-d', request('date_of_birth'));
        $personalInfo->country_of_birth_id = request('country_of_birth');
        $personalInfo->city_of_birth = request('city_of_birth');
        $personalInfo->id_type = request('id_type');
        $personalInfo->id_number = request('id_number');
        $personalInfo->id_issue_date = Carbon::createFromFormat('Y-m-d', request('id_issue_date'));
        $personalInfo->marital_status = request('marital_status');
        $personalInfo->nationality = request('nationality');
        
        if(request('gender') == 'male'){
            $this->saveMilitaryInfo($app_id);
        }
          $personalInfo->save();
        
    }
    
    private function saveMilitaryInfo($app_id){
       $militaryInfo = MilitaryInfo::where('application_id','=',$app_id);
        if(is_null($militaryInfo)){
            $militaryInfo = new MilitaryInfo;
            $militaryInfo->application_id = $app_id;
        }
        $militaryInfo->military_number = request('military_number');
        $militaryInfo->trible_military_number = request('trible_military_number');
        $militaryInfo->military_region = request('military_region');
        $militaryInfo->save();
    }
    
    
}
