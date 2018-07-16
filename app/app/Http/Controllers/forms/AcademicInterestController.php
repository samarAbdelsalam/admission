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
        $topics1 = AcademicInterestResearchTopic::where('application_id', '=' . $app_id)->get()->all();
        $academicIterest = AcademicInterest::where('application_id', '=', $app_id)->get()->first();
        $selectedMajor = $academicIterest->major;
        $departments = \App\Department::where('major_id', '=', $selectedMajor);

        if (count($topics1) > 0) {
            $topics1 = $topics1[0];
        } else {
            $topics1 = new AcademicInterestResearchTopic;
        }

        return view('forms.researchTopic1', compact('topics1', 'departments'));
    }

    public function index2() {
        $app_id = AcademicInterestController::getAppId();
        $topics2 = AcademicInterestResearchTopic::where('application_id', '=' . $app_id)->get()->all();
        $academicIterest = AcademicInterest::where('application_id', '=', $app_id)->get()->first();
        $selectedMajor = $academicIterest->major;
        $departments = \App\Department::where('major_id', '=', $selectedMajor);

        if (count($topics2) > 1) {
            $topics2 = $topics2[1];
        } else {
            $topics2 = new AcademicInterestResearchTopic;
        }

        return view('forms.researchTopic1', compact('topics2', 'departments'));
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
                    'topics' => 'required|array|max:3|min:2'
        ]);
    }

    public function save(){
        $this->validator(request()->all())->validate();
        $major = request('major');
        $semseter = request('semester');
        $degree = request('degree');
        $app_id = AcademicInterestController::getAppId();
        $academicInterest = AcademicInterest::where('application_id','=',$app_id)->get()->first();
        if(is_null($academicInterest)){
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
            $topics->delete();
        }
        foreach ($newTopics as $t) {
            $topic = new AcademicInterestResearchTopic;
            $topic->dept_id = $department;
            $topic->topic_id = $t;
            $topic->save();
        }
    }

    public function saveTopics2() {

        if (!is_null(request('department'))) {

            $this->validator(request()->all())->validate();

            $app_id = AcademicInterestController::getAppId();

            $department = request('department');
            $newTopics = request('topics');
            $topics = AcademicInterestResearchTopic::where('application_id', '=', $app_id)->get()->all();
            if (count($topics) > 0) {
                //Delete the old and save all again
                $topics->delete();
            }
            foreach ($newTopics as $t) {
                $topic = new AcademicInterestResearchTopic;
                $topic->dept_id = $department;
                $topic->topic_id = $t;
                $topic->save();
            }
        }
    }

//    public function save(){
//        
//        $this->validator(request()->all())->validate();
//        $term = request('term');
//        $applied_degree = request('degree');
//        $major_id = request('major');
//        $app_id = AcademicInterestController::getAppId();
//        $academicInterest = AcademicInterest::where('application_id','=',$app_id);
//        if(is_null($academicInterest)){
//            $academicInterest = new AcademicInterest;
//            $academicInterest->application_id = $app_id;
//        }
//        $academicInterest->major_id = $major_id;
//        $academicInterest->applied_degree = $applied_degree;
//        $academicInterest->term = $term;
//        $academicInterest->save();
//    }

    public function removeTopic() {
        $id = request('topicId');
        if (!empty($id) && is_numeric($id)) {

            $app_id = AcademicInterestController::getAppId();
            $topic = AcademicInterestResearchTopic::where('application_id', '=', $app_id)->where('topic_id', '=', $id);
            $topic->delete();
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
