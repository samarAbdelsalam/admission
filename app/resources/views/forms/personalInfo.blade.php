
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function () {
      
    @if (!is_null($personalInfo))
        var selectedGender = "{{$personalInfo->gender}}";
        var selectedCountry = "{{$personalInfo->country_of_birth_id}}";
        var selectedCity = "{{$personalInfo->city_of_birth}}";
        var selectedNationality = "{{$personalInfo->nationality_Id}}";
        var selectedIdTyp = "{{$personalInfo->id_type}}";
        var selectedMaritalStatus = "{{$personalInfo->marital_status}}";


        $('#gender').val(selectedGender);
        $('#country').val(selectedCountry);
        $('#nationality').val(selectedNationality);
        $('#id_type').val(selectedIdTyp);
        $('#marital_status').val(selectedMaritalStatus);
        getCities(selectedCountry,'city_of_birth');
        $('#city_of_birth').val(selectedCity);
     
    @endif
    
    @if(!is_null($militaryInfo))
        
        var selectedMilitaryStatus = "{{$militaryInfo->military_status}}";
        $('#military_status').val(selectedMilitaryStatus)
        @endif
    });
    

</script>
<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 1 of 14 </h3><h2>Personal Information</h2></div>
                <div class="panel-body">
                    @if(Session::has('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        </div>
                    </div>
                    @endif
                    @include('layouts.errors')
                    <form method="post" action="/personalInfo/save">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group required">
                            <label class="control-label">First Name</label>
                            <input  type="text" name="first_name" class="form-control" value="@if(!is_null($personalInfo)){{$personalInfo->fname}} @endif">
                        </div>  
                        <div class="form-group required">
                            <label class="control-label">Middle Name</label>
                            <input type="text" name="middle_name" value="@if(!is_null($personalInfo)){{$personalInfo->mname}} @endif" class="form-control">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="@if(!is_null($personalInfo)){{$personalInfo->lname}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Gender</label>
                            <select name="gender" class="form-control" id="gender">
                                <option name="male">Male</option>
                                <option name="female">Female</option>
                            </select>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="form-control" value="@if(!is_null($personalInfo)){{$personalInfo->date_of_birth}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Country Of Birth</label>
                            <select class="form-control" name="country_of_birth" id="country" onchange="getCities(this.value, 'city_of_birth')">
                                @foreach($countries as $country)
                                <option value = "{{$country->Code}}">{{$country->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">City Of Birth</label>
                            <select class="form-control" name="city_of_birth" id="city_of_birth"></select>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Nationality</label>
                            <select class="form-control" name="nationality" id="nationality">
                                @foreach($nationlities as $nationality)
                                <option value="{{$nationality->Id}}">{{$nationality->Name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">ID Type</label>
                            <select name="id_type" class="form-control" id="id_type">
                                <option value="national id">National Id</option>
                                <option value="passport">Passport</option>
                            </select>

                        </div>
                        <div class="form-group required">
                            <label class="control-label">ID Number</label>
                            <input type="text" name="id_number" class="form-control" value="@if(!is_null($personalInfo)){{$personalInfo->id_number}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Id issue date</label>
                            <input type="date" value="@if(!empty($personalInfo)){{$personalInfo->id_issue_date}}@endif" name="id_issue_date" class="form-control">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Marital Status</label>
                            <select name="marital_status" id = "marital_status" class="form-control">
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widow">Widow</option>
                            </select>
                        </div> 
                        <h4><mark><b>Military Information For Males Only</b></mark></h4>
                        <div class="form-group required">
                            <label class="control-label">Military Status</label>
                            <select class="form-control" name="military_status">
                                <option value="Extemped">Extemped</option>
                                <option value="Temporary Extemped">Temporary Extemped</option>
                                <option value="Completed">Completed</option>
                                <option value="Not Completed">Not Completed</option>
                            </select>

                        </div>
                        
                        <div class="form-group required">
                            <label class="control-label">Military Number</label>
                            <input type="text" name="military_number" class="form-control" value="@if(!is_null($militaryInfo)){{$militaryInfo->military_status}}@endif"/>
                        </div>
                        
                        <div class="form-group required">
                            <label class="control-label">Trible Military Number</label>
                            <input type="text" class="form-control" name="trible_military_number" value="@if(!is_null($militaryInfo)){{$militaryInfo->trible_military_number}}@endif"/>
                        </div>
                        
                        <div class="form-group required">
                            <label class="control-label">Military Region</label>
                            <input type="text" name="military_region" value="@if(!is_null($militaryInfo)){{$militaryInfo->military_region}}@endif" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input type="Submit" value="Save anf Next" class="btn btn-primary pull-right"/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
