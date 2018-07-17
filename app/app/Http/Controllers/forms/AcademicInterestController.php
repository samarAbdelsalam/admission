<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\AcademicInterest;
use App\Major;
use App\ResearchTopic;
use App\AcademicInterestResearchTopic;
use App\Http\Controllers\Controller;

class AcademicInterestController extends Controller {

    public function index() {
//        $app_id = AcademicInterestController::getAppId();
//        $academicInterest = AcademicInterest::where('application_id', '=', $app_id)->get()->all();
//        $major = Major::get()->all();
//        $topics = AcademicInterestResearchTopic::where('application_id','=',$app_id)->get()->all(); 
//        
//        return view('forms.academicInterest', compact('academicInterest', 'major','topics'));

        $app_id = AcademicInterestController::getAppId();
        $academicInterest = AcademicInterest::where('application_id', '=', $app_id)->get()->first();
        $major = Major::get()->all();

        return view('forms.academicInterest', compact('academicInterest', 'major'));
    }

    public function index1() {
        $app_id = AcademicInterestController::getAppId();
        $academicIterest = AcademicInterest::where('application_id', '=', $app_id)->get()->first();
        $selectedMajor = $academicIterest->major_id;
        $selectedDept1 = AcademicInterestResearchTopic::where('application_id', '=', $app_id)->where('priority', '=', 1)->get()->all();
        if (count($selectedDept1) > 0) {
            $selectedDept1 = $selectedDept1[0]->dept_id;
            $selectedTopics = AcademicInterestResearchTopic::where('application_id', '=', $app_id)
                            ->where('dept_id', '=', $selectedDept1)->get()->all();
            //dd($selectedTopics);

            $topics = ResearchTopic::where('department_id', '=', $selectedDept1)
                            ->where('display', '=', 1)->get()->all();
        } else {
            $selectedDept1 = null;
            $selectedTopics = array();
            $topics = array();
        }
        $departments = \App\Department::where('school_id', '=', $selectedMajor)->where('display', '=', 1)->get()->all();


        return view('forms.academicInterestTopics1', compact('departments', 'selectedDept1', 'selectedTopics', 'topics'));
    }

    public function index2() {
        $app_id = AcademicInterestController::getAppId();
        $academicIterest = AcademicInterest::where('application_id', '=', $app_id)->get()->first();
        $selectedMajor = $academicIterest->major_id;
        //$perviouslySelectedDepartment = AcademicInterestResearchTopic
        $selectedDept2 = AcademicInterestResearchTopic::where('application_id','=',$app_id)
                                                        ->where('priority','=',2)->get()->all();
       // dd($selectedDept2);

        if (count($selectedDept2) > 0) {
            $selectedDept2 = $selectedDept2[0]->dept_id;
            $selectedTopics = AcademicInterestResearchTopic::where('application_id', '=', $app_id)
                            ->where('dept_id', '=', $selectedDept2)
                            ->where('priority','=',2)->get()->all();
           // dd($selectedTopics);
            $topics = ResearchTopic::where('department_id', '=', $selectedDept2)
                                     ->where('display', '=', 1)->get()->all();
        } else {
            $selectedDept2 = null;
            $selectedTopics = array();
            $topics = array();
        }
        $departments = \App\Department::where('school_id', '=', $selectedMajor)->where('display', '=', 1)->get()->all();

        return view('forms.academicInterestTopics2', compact('departments', 'selectedDept2', 'selectedTopics', 'topics'));
    }

    private function validator(array $data) {
        return Validator::make($data, [
                    'major' => 'required|integer',
                    'semester' => 'required|alpha|max:6',
                    'degree' => 'required|alpha|max:6'
        ]);
    }

    private function validatorTopics(array $data) {
        return Validator::make($data, [
                    'department' => 'required|integer',
                    'topics' => 'required|array|max:3|min:1'
        ]);
    }

    public function save() {
        $this->validator(request()->all())->validate();
        $major = request('major');
        $semseter = request('semester');
        $degree = request('degree');
        $app_id = AcademicInterestController::getAppId();
        $academicInterest = AcademicInterest::where('application_id', '=', $app_id)->get()->first();
        if (is_null($academicInterest)) {
            $academicInterest = new AcademicInterest;
            $academicInterest->application_id = $app_id;
        }
        $academicInterest->major_id = $major;
        $academicInterest->semester = $semseter;
        $academicInterest->applied_degree = $degree;
        $academicInterest->save();
    }

    public function saveTopics1() {
        $this->validatorTopics(request()->all())->validate();
        $app_id = AcademicInterestController::getAppId();
        $department = request('department');
        $newTopics = request('topics');
        $topics = AcademicInterestResearchTopic::where('application_id', '=', $app_id)->get()->all();
        if (count($topics) > 0) {
            //Delete the old and save all again
           foreach($topics as $t){
               $t->delete();
           }
        }
        foreach ($newTopics as $t) {
            $topic = new AcademicInterestResearchTopic;
            $topic->dept_id = $department;
            $topic->topic_id = $t;
            $topic->application_id = $app_id;
            $topic->priority = 1;
            $topic->save();
        }
    }

    public function saveTopics2() {
        if (!is_null(request('department'))) {
            $this->validatorTopics(request()->all())->validate();
            $app_id = AcademicInterestController::getAppId();
            $department = request('department');
            $newTopics = request('topics');
            $topics = AcademicInterestResearchTopic::where('application_id', '=', $app_id)
                                                    ->where('priority','=',2)->get()->all();
            if (count($topics) > 0) {
                //Delete the old and save all again
                foreach ($topics as $t){
                    $t->delete();
                }
            }
            foreach ($newTopics as $t) {
                $topic = new AcademicInterestResearchTopic;
                $topic->dept_id = $department;
                $topic->topic_id = $t;
                $topic->application_id = $app_id;
                $topic->priority = 2;
                $topic->save();
            }
        }
    }

    public function removeDept() {
        $app_id = AcademicInterestController::getAppId();
        $academicInterestTopics = AcademicInterestResearchTopic::where('application_id','=',$app_id)
                                                                ->where('prioprity','=',2)->get()->all();
        if(count($academicInterestTopics) > 0){
            foreach ($academicInterestTopics as $t){
                $t->delete();
            }
            return response()->json(['success' => true]);
        }
     }

//    public function saveTopic() {
//        $topic_id = request('topic_id');
//        $dept_id = request('dept_id');
//        $app_id = AcademicInterestController::getAppId();
//        if (!empty($topic_id) && !empty($dept_id) && is_numeric($dept_id) && is_numeric($topic_id)) {
//            //Check if it was added before 
//            $topic = AcademicInterestResearchTopic::where('topic_id', '=', $topic_id)
//                            ->where('dept_id', '=', $dept_id)
//                            ->where('application_id', '=', $app_id)->get()->all();
//            if (count($topic) > 0) {
//                return response()->json(['success' => false, 'messeage' => 'This topic was added before']);
//            } else {
//                $countDept = AcademicInterestResearchTopic::where('dept_id', '=', $dept_id)
//                                ->where('application_id', '=', $app_id)->count();
//                //Check for maximum number for topics per department
//                if ($countDept > 2) {
//
//                    return response()->json(['success' => false, 'messeage' => 'Maximum three topics per department are allowed']);
//                }
//                //Check for number of departments already selected
//                $dept_selected = AcademicInterestResearchTopic::where('application_id', '=', $app_id)
//                                ->where('dept_id', '=', $dept_id)
//                                ->groupby('dept_id')->count();
//                if ($dept_selected > 2) {
//
//                    return response()->json(['success' => false, 'messeage' => 'Maximum two departments are allowed']);
//                }
//            }
//            //If Passed all of the above then we finally save
//            $topic = new AcademicInterestResearchTopic;
//            $topic->application_id = $app_id;
//            $topic->topic_id = $topic_id;
//            $topic->dept_id = $dept_id;
//            $topic->save();
//            return response()->json(['success' => true]);
//        }
//    }
}
