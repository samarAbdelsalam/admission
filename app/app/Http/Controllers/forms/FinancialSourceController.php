<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class FinancialSourceController extends Controller {

    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {
        
        $app_id = FinancialSourceController::getAppId();
        $financialInfo = \App\FinancialSource::where('application_id','=',$app_id)->get()->first();
        return view('forms.financialInfo', compact('financialInfo'));

        
    }
    
    private function validator(array $data){
        
        return Validator::make($data,[
           'source' => 'required|alpha_spaces|max:25',
            'organization_name'=> 'required|alpha_spaces|max:100'
        ]);
    }
    
    public function save(){
        $this->validator(request()->all())->validate();
        $app_id = FinancialSourceController::getAppId();
        $financialSource = \App\FinancialSource::where('application_id','=',$app_id)->get()->first();
        if(is_null($financialSource)){
            $financialSource = new \App\FinancialSource;
            $financialSource->application_id = $app_id;
        }
        $financialSource->source = request('source');
        $financialSource->organization_name = request('organization_name');
        $financialSource->save();
        
    }

}
