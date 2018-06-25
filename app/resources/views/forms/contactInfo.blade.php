
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function(){
       @if ( !is_null($contactInfo) )
           var selectedCountry = "{{$contactInfo->country_Code}}";
           $('#country').val(selectedCountry);
           getCities(selectedCountry,'city');
           var selectedCity = "{{$contactInfo->city_Id}}";
           $('#city').val(selectedCity);
       @endif    
    });


</script>
<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 2 of 14 </h3><h2>Contact Information</h2></div>
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
                    <form method="post" action="/contactInfo/save">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group required">
                            <label class="control-label">Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="@if(!is_null($contactInfo)){{$contactInfo->mobile}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Landline</label>
                            <input type="text" class="form-control" name="landline" value="@if(!is_null($contactInfo)){{$contactInfo->landline}}@endif">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" name="email" value="@if(!is_null($contactInfo)){{$contactInfo->email}}@endif">
                        </div>

                        <h3><mark><b>Address Information</b></mark></h3>
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
                        <div class="form-group required">
                            <label class="control-label">Postal Code</label>
                            <input type="text" class="form-control" name="postal_code" value="@if(!is_null($contactInfo)){{$contactInfo->postal_code}}@endif">
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Street </label>
                            <input type="text" name="street" value="@if(!is_null($contactInfo)){{$contactInfo->street}}@endif" class="form-control">
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Building Number</label>
                            <input type="text" class="form-control" name="building_number" value="@if(!is_null($contactInfo)){{$contactInfo->building_number}}@endif">
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