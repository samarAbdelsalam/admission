<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Carbon\Carbon;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;


    public static function getAppId(){
       // dd(auth()->user()->get()->first()->id);
        //TODO get the app id using the user id and the last submission id
      return \App\Application::where('users_id','=',auth()->user()->get()->first()->id)->get()->first()->id;

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
        $lastSubmission = DB::table('submission')->orderBy('id', 'desc')->first();
        $isfound = DB::table('submission')->where('id', '=', $lastSubmission->id)
                        ->where('start_date', '<=', Carbon::now())
                        ->where('end_date', '>=', Carbon::now())->count();

        if ($isfound > 0) {
            return true;
        } else {
            return false;
        }
    }

}
