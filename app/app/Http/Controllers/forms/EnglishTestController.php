<?php

namespace App\Http\Controllers\forms;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EnglishTest;
use Illuminate\Support\Facades\Validator;
 

class EnglishTestController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth');
    }
    public function index(){
        $app_id = EnglishTestController::getAppId();
        $englishTest = EnglishTest::where('application_id','=',$app_id)->get()->first();
        return view('forms.englishTest',compact('englishTest'));
    }
    
    protected function validator(array $data){
        $rules = array('test'=>'required|alpha_spaces|max:30');
        if($data['test'] != 'Not Taken'){
           $rules = array_merge($rules,array( 'score'=>'required|numeric|max:10')); 
        }
        return Validator::make($data,$rules);
    }


    public function save(){
       
        $this->validator(request()->all())->validate();
        $app_id = EnglishTestController::getAppId();
        $englisTest = EnglishTest::where('application_id','=',$app_id)->get()->first();
        if(is_null($englisTest)){
            
            $englisTest = new EnglishTest;
        }
        $englisTest->english_language_test = request('test');
        $englisTest->score = request('score');
        $englisTest->application_id = $app_id;
        $englisTest->save();
    }
}
