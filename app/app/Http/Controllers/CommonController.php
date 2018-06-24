<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;

class CommonController extends Controller
{
      public function getCities()
    {
        $country_id = request('countryId');
        $cities = City::where('country_Code', '=', $country_id)->get();
        return response()->json(['cities' => $cities]);
    }
}
