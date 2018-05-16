<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;


    public static function getAppId(){
        
        //TODO get the app id using the user id and the last submission id
      return \App\Application::where('user_id','=',auth()->user()->id)->get()->first()->id;

    }
    public static function isComfirmed() {
        $app_id = Controller::getAppId();
        $application = \App\Application::where('id', '=', $app_id)->get()->first();
        if ($application->status) {
            return true;
        } else {
            return false;
        }
    }

    public function isAdmissionOpened() {
        $lastSubmission = DB::table('tbl_submissions')->orderBy('id', 'desc')->first();
        $isfound = DB::table('tbl_submissions')->where('id', '=', $lastSubmission->id)
                        ->where('start_date', '<=', Carbon::now())
                        ->where('end_date', '>=', Carbon::now())->count();

        if ($isfound > 0) {
            return true;
        } else {
            return false;
        }
    }

}
