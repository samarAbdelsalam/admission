<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Reference;

class ReferenceInfoController extends Controller
{
    public function __construct() {
        
        $this->middleware('auth');
    }
    public function index(){
        
        $app_id = ReferenceInfoController::getAppId();
        $references = Reference::where('application_id','=',$app_id)->get()->all();
        if(count($references) == 0){
            $reference1 = null;
            $reference2= null;
            $reference3= null;

        }else{
            $reference1 = $references[0];
            $reference2 = $references[1];
            $reference3 = $references[2];

            
        }
        return view('forms.refernces',compact('reference1','reference2','reference3'));
        
    }
    
    private function validator(array $data){
        
        return Validator::make($data,[
            
            'reference_1_first_name' => 'required|alpha_spaces|max:50',
            'reference_1_middle_name' => 'required|alpha_spaces|max:50',
            'reference_1_last_name' => 'required|alpha_spaces|max:50',
            'reference_1_affiliation' => 'required|alpha_spaces|max:50',
            'reference_1_position' => 'required|alpha_spaces|max:50',
            'reference_1_phone' => 'required||max:50|phone',
            'reference_1_mobile' => 'required||max:50|phone',
            'reference_1_email' => 'required||max:50|email',

            'reference_2_first_name' => 'required|alpha_spaces|max:50',
            'reference_2_middle_name' => 'required|alpha_spaces|max:50',
            'reference_2_last_name' => 'required|alpha_spaces|max:50',
            'reference_2_affiliation' => 'required|alpha_spaces|max:50',
            'reference_2_position' => 'required|alpha_spaces|max:50',
            'reference_2_phone' => 'required||max:50|phone',
            'reference_2_mobile' => 'required||max:50|phone',
            'reference_2_email' => 'required||max:50|email',
            
            'reference_3_first_name' => 'required|alpha_spaces|max:50',
            'reference_3_middle_name' => 'required|alpha_spaces|max:50',
            'reference_3_last_name' => 'required|alpha_spaces|max:50',
            'reference_3_affiliation' => 'required|alpha_spaces|max:50',
            'reference_3_position' => 'required|alpha_spaces|max:50',
            'reference_3_phone' => 'required||max:50|phone',
            'reference_3_mobile' => 'required||max:50|phone',
            'reference_3_email' => 'required||max:50|email',

        ]);
    }
    
    
    
    public function save(){
        
        $this->validator(request()->all())->validate();
        
        $app_id = ReferenceInfoController::getAppId();
        $refernces = Reference::where('application_id','=',$app_id)->get()->all();
        if(count($refernces) == 0){
            $refernce1 = new Reference;
            $refernce1->application_id = $app_id;
            $refernce2 = new Reference;
            $refernce2->application_id = $app_id;
            $refernce3 = new Reference;
            $refernce3->application_id = $app_id;
        }else{
            $refernce1 = $refernces[0];
            $refernce2 = $refernces[1];
            $refernce3 = $refernces[2];
        }
        
        $refernce1->fname = request('reference_1_first_name');
        $refernce1->mname = request('reference_1_middle_name');
        $refernce1->lname = request('reference_1_last_name');
        $refernce1->affiliation = request('reference_1_affiliation');
        $refernce1->position = request('reference_1_position');
        $refernce1->telephone = request('reference_1_phone');
        $refernce1->mobile = request('reference_1_mobile');
        $refernce1->email = request('reference_1_email');
        
        $refernce2->fname = request('reference_2_first_name');
        $refernce2->mname = request('reference_2_middle_name');
        $refernce2->lname = request('reference_2_last_name');
        $refernce2->affiliation = request('reference_2_affiliation');
        $refernce2->position = request('reference_2_position');
        $refernce2->telephone = request('reference_2_phone');
        $refernce2->mobile = request('reference_2_mobile');
        $refernce2->email = request('reference_2_email');
        
        $refernce3->fname = request('reference_3_first_name');
        $refernce3->mname = request('reference_3_middle_name');
        $refernce3->lname = request('reference_3_last_name');
        $refernce3->affiliation = request('reference_3_affiliation');
        $refernce3->position = request('reference_3_position');
        $refernce3->telephone = request('reference_3_phone');
        $refernce3->mobile = request('reference_3_mobile');
        $refernce3->email = request('reference_3_email');
        
        $refernce1->save();
        $refernce2->save();
        $refernce3->save();
        
        
        
        
    }
}
