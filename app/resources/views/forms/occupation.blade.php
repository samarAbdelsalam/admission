
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function(){
       @if ( !is_null($occupation) )
           var selectedCountry = "{{$occupation->country_Code}}";
           $('#country').val(selectedCountry);
           getCities(selectedCountry,'city');
           var selectedCity = "{{$occupation->city_Id}}";
           $('#city').val(selectedCity);
       @endif    
    });


</script>
<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 3 of 14 </h3><h2>Occupation</h2></div>
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
                    <form method="post" action="/occupation/save">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group required">
                            <label class="control-label">Affiliation</label>
                            <input type="text" name="affiliation" class="form-control" value="@if(!is_null($occupation)){{$occupation->affiliation}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Department</label>
                            <input type="text" class="form-control" name="department" value="@if(!is_null($occupation)){{$occupation->department}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Position</label>
                            <input type="text" class="form-control" name="position" value="@if(!is_null($occupation)){{$occupation->position}}@endif">
                      
                        </div>
                          <div class="form-group required">
                            <label class="control-label">Date Of Hiring</label>
                            <input type="date" class="form-control" name="date_of_hiring" value="@if(!is_null($occupation)){{$occupation->date_of_hiring}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Country</label>
                            <select class="form-control" name="country" id="country" onchange="getCities(this.value,'city')">
                                @foreach($countries as $country)
                                <option value="{{$country->Code}}">{{$country->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">City</label>
                            <select class="form-control" id="city" name="city">
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save and Next" class="btn btn-primary pull-right">
                            <input type="butto" value="Previous" class="btn btn-primary pull-left">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection