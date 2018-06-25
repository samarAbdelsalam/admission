<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App;
use App\OccupationInfo;

class OccupationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        $countries = App\Country::get()->all();
        $app_id = OccupationController::getAppId();
        $occupation = OccupationInfo::where('application_id','=',$app_id)->get()->first();
        return view('forms.occupation',compact('countries','occupation'));
    }
    
    private function validator(array $data){
        
        return Validator::make($data,[
            'affiliation' => 'alpha_spaces|required|max:50',
            'department' => 'alpha_spaces|required|max:50',
            'position' => 'alpha_spaces|required|max:50',
            'date_of_hiring' =>'required|date',
            'country' => 'required|alpha|max:2|min:2',
            'city' => 'required|integer'
        ]);
    }
    
    public function save(){
        
        $this->validator(request()->all())->validate();
        $app_id = OccupationController::getAppId();
        $occupation = OccupationInfo::where('application_id','=',$app_id)->get()->first();
        if(is_null($occupation)){
            $occupation = new OccupationInfo;
            $occupation->application_id = $app_id;
        }
        $occupation->affiliation = request('affiliation');
        $occupation->department = request('department');
        $occupation->position = request('position');
        $occupation->date_of_hiring = Carbon::createFromFormat('Y-m-d', request('date_of_hiring'));
        $occupation->country_Code = request('country');
        $occupation->city_Id = request('city');
        $occupation->save();
    }
    
    
    
}
