<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\AcademicBackgroundDegree;
use App\AcademicInterest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\University;
use Carbon\Carbon;

class AcademicBackgroundController extends Controller
{
       public function __construct() {
        
        $this->middleware('auth');
    }
    
    public function index(){
        $app_id = AcademicBackgroundController::getAppId();
        $academicDegree1 = AcademicBackgroundDegree::where('application_id','=',$app_id)
                                                     ->where('type','=','BSc')->get()->first();
        
       // dd($academicDegree1->university);
        $academicDegree2 = AcademicBackgroundDegree::where('application_id','=',$app_id)
                                                    ->where('type','=','MSc')->get()->first();
        
        //dd($academicDegree2);
        $universities = University::get()->all();
        $applied_degree = AcademicInterest::where('application_id','=',$app_id)->get()->first()->applied_degree;
                
        return view('forms.academicBackgroundDegree',compact('academicDegree1','universities','academicDegree1','academicDegree2','applied_degree'));
        
    }
    
    public function validator(array $data , $applied_degree){
        
        $rules = array(
            'BSc_university'    => 'required|integer',
            'BSc_major'         => 'required|alpha_spaces|max:100',
            'BSc_department'    => 'required|alpha_spaces|max:100',
            'BSc_faculty'       => 'required|alpha_spaces|max:100',
            'BSc_GPA'           => 'required|grade|max:5',
            'BSc_thesis_name'   => 'required|alpha_spaces|max:150',
            'BSc_rank'          => 'required|alpha_num_spaces|max:30',
            'BSc_receive_date' => 'required|date'
            )
            
        ;
        if($applied_degree == 'PhD'){
            $rules = array_merge($rules,array(
            'MSc_university'    => 'required|integer',
            'MSc_major'         => 'required|alpha_spaces|max:100',
            'MSc_department'    => 'required|alpha_spaces|max:100',
            'MSc_faculty'       => 'required|alpha_spaces|max:100',
            'MSc_GPA'           => 'required|grade|max:5',
            'MSc_thesis_name'   => 'required|alpha_spaces|max:150',
            'MSc_rank'          => 'required|alpha_num_spaces|max:30',
            'MSc_receive_date' => 'required|date'
                
            ));
        }
        return Validator::make($data,$rules);
     }
    
    public function save(){
        $app_id = AcademicBackgroundController::getAppId();
        $academicInterest = AcademicInterest::where('application_id','=',$app_id)->get()->first();
        $applied_degree = $academicInterest->applied_degree;
        
        $this->validator(request()->all(), $applied_degree)->validate();
        
        $academicDegree = AcademicBackgroundDegree::where('application_id','=', $app_id)->get()->all();
        if(count($academicDegree) > 0){
            foreach($academicDegree as $degree){
                $degree->delete();
            }
        }
        $academicDegree = new AcademicBackgroundDegree;
        $academicDegree->application_id = $app_id;
        $academicDegree->university = request('BSc_university');   
        $academicDegree->department = request('BSc_department');    
        $academicDegree->faculty =  request('BSc_faculty');       
        $academicDegree->gpa = request('BSc_GPA');           
        $academicDegree->thesis = request('BSc_thesis_name');  
        $academicDegree->rank = request('BSc_rank'); 
        $academicDegree->major = request('BSc_major');
        //$personalInfo->date_of_birth = Carbon::createFromFormat('Y-m-d', request('date_of_birth'));

        $academicDegree->date = Carbon::createFromFormat('Y-m-d', request('BSc_receive_date'));
        $academicDegree->type = 'BSc';
        $academicDegree->save();
        
        if($applied_degree == 'PhD'){
            $academicDegree2 = new AcademicBackgroundDegree;
            $academicDegree2->application_id = $app_id;
            $academicDegree2->university = request('MSc_university');   
            $academicDegree2->department = request('MSc_department');    
            $academicDegree2->faculty =  request('MSc_faculty');       
            $academicDegree2->gpa = request('MSc_GPA');           
            $academicDegree2->thesis = request('MSc_thesis_name');  
            $academicDegree2->rank = request('MSc_rank');         
            $academicDegree2->date = Carbon::createFromFormat('Y-m-d', request('MSc_receive_date'));
            $academicDegree2->type = 'MSc';
            $academicDegree2->major = request('MSc_major');
            $academicDegree2->save();
        }

    }
}
