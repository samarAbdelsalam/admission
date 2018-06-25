<?php

namespace App\Http\Controllers\forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App;
class ContactInfoController extends Controller {
       

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $countries = App\Country::get()->all();
        $app_id = ContactInfoController::getAppId();
        $contactInfo = ContactInfo::where('application_id', '=', $app_id)->get()->first();
        return view('forms.contactInfo', compact('contactInfo', 'countries'));
    }

    private function validator(array $data) {
        return Validator::make($data,[
            'mobile' => 'required|phone|max:20',
            'landline' => 'required|phone|max:20',
            'country' => 'required|alpha|max:2|min:2',
            'city' => 'required|integer',
            'email' => 'required|email|max:50',
            'postal_code' => 'required|alpha_num|max:6',
            'street' => 'required|alpha_spaces|max:50',
            'building_number' => 'alpha_num|max:5'
            
        ]);
    }

    public function save() {
        
        $this->validator(request()->all())->validate();
        $app_id = ContactInfoController::getAppId();
        $contactInfo = ContactInfo::where('application_id','=',$app_id)->get()->first();
        if(is_null($contactInfo)){
            
            $contactInfo = new ContactInfo;
            $contactInfo->application_id = $app_id;
        }
        
        $contactInfo->mobile = request('mobile');
        $contactInfo->landline = request('landline');
        $contactInfo->country_Code = request('country');
        $contactInfo->city_Id = request('city');
        $contactInfo->email = request('email');
        $contactInfo->postal_code = request('postal_code');
        $contactInfo->street = request('street');
        $contactInfo->building_number = request('building_number');
        
        $contactInfo->save();
    }

}
