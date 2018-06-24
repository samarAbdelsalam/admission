<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Submission;
use App\Application;
use Carbon\Carbon;
use storage;

class LoginController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }

    public function userLogout() {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    protected function authenticated(Request $request, $user) {

        $submission = \DB::table('submission')->orderBy('id', 'DESC')->first();
        $app = Application::where('users_id', '=', $user->id)->where('submission_id', '=', $submission->id)->get()->first();
        //dd($app);
        if (is_null($app)) {
            $app = new Application;
            $app->users_id = $user->id;
            $app->submission_id = $submission->id;
            $app->save();
            //create user directory here
            //$dirName = str_replace(' ', '_', $user->name);
           // $this->createUserDir($dirName);
        } else {
            if ($app->status == 0) {
                return redirect('/personalInfo');
            } else {
                return view('application.confirmed');
            }
        }
    }
    
    
        public function login(Request $request) {
        //Before attemping the login check for the latest submission date  

        if (LoginController::isAdmissionOpened()) {
            //return view('application.closed');


            $this->validateLogin($request);

            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        } else {
            return view('application.closed');
        }
    }

}
