<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        
        $app_id = PersonalInfoController::getAppId();
        //dd($app_id);
        $personalInfo = PersonalInfo::where('application_id','=',$app_id)->get()->first();
        //dd($personalInfo->fname);
        $countries = App\Country::get()->all();
        //dd($countries);
        $nationlities = \App\Nationality::get()->all();
        $militaryInfo = App\MilitaryInfo::where('application_id','=',$app_id)->get()->first();
       // dd($militaryInfo);
        return view('forms.personalInfo', compact('personalInfo', 'countries', 'nationlities','militaryInfo'));
        
    }
   
    private function validator(array $data){
           $rules = [
            'first_name'        => 'required|alpha_spaces|max:30|min:3',
            'middle_name'       => 'required|alpha_spaces|max:30|min:3',
            'last_name'         => 'required|alpha_spaces|max:30|min:3',
            'gender'            => 'required|alpha|max:8',
            'date_of_birth'     => 'required|date',
            'country_of_birth'  => 'required|alpha|max:2|min:2',
            'city_of_birth'     => 'required|Integer',
            'id_type'           => 'required|max:20|alpha_spaces',
            'id_number'         => 'required|alpha_num|max:50',
            'id_issue_date'     => 'required|date',
            'marital_status'    => 'required|alpha|max:20',
            'nationality'       => 'required|Integer',
        ];
        if($data['gender'] == 'Male'){
         
           $rules = array_merge($rules,[
                
                'military_number'   => 'required|alpha_num|max:30',
                'trible_military_number' => 'required|alpha_num|max:30',
                'military_region' => 'required|alpha_num|max:30',
                'military_status'   =>'required|alpha_spaces|max:20'

                
            ]);
        }
          return Validator::make($data,$rules);
          
    }
    
    public function save(){
        
        $this->validator(request()->all())->validate();
        
        $app_id = PersonalInfoController::getAppId();
        
        $personalInfo = PersonalInfo::where('application_id','=',$app_id)->get()->first();
        if(is_null($personalInfo)){
            
            $personalInfo = new PersonalInfo;
            $personalInfo->application_id = $app_id;
        }
        
        $personalInfo->fname = request('first_name');
        $personalInfo->mname = request('middle_name');
        $personalInfo->lname = request('last_name');
        $personalInfo->gender = request('gender');
        $personalInfo->date_of_birth = Carbon::createFromFormat('Y-m-d', request('date_of_birth'));
        $personalInfo->country_of_birth_id = request('country_of_birth');
        $personalInfo->city_of_birth = request('city_of_birth');
        $personalInfo->id_type = request('id_type');
        $personalInfo->id_number = request('id_number');
        $personalInfo->id_issue_date = Carbon::createFromFormat('Y-m-d', request('id_issue_date'));
        $personalInfo->marital_status = request('marital_status');
        $personalInfo->nationality_Id = request('nationality');
        $personalInfo->save();

        if(request('gender') == 'Male'){
            $this->saveMilitaryInfo($app_id);
        }
        
    }
    
    private function saveMilitaryInfo($app_id){
       $militaryInfo = MilitaryInfo::where('application_id','=',$app_id)->get()->first();
        if(is_null($militaryInfo)){
            $militaryInfo = new MilitaryInfo;
            $militaryInfo->application_id = $app_id;
        }
        $militaryInfo->military_number = request('military_number');
        $militaryInfo->trible_military_number = request('trible_military_number');
        $militaryInfo->military_region = request('military_region');
        $militaryInfo->military_status = request('military_status');
        $militaryInfo->save();
    }
    
    
}
