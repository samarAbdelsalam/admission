
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function(){
        @if(!is_null($financialInfo))
            var selectedSource = "{{$financialInfo->source}}";
            $('#source').val(selectedSource);
        @endif    
    });
</script>
<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 7 of 14 </h3><h2>English Level</h2></div>
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
                    <form method="post" action="/financialInfo/save">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group required">
                            <label class="control-label">Source</label>
                            <select name="source" id="source" class="form-control">
                                <option value='self funded' >Self Funded</option>
                                <option value='governmental scholarship'>Governmental ScholarShip</option>
                                <option value='private scholarship'>Private Scholarship</option>
                            </select>
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Organization Name</label>
                            <input type="text" class="form-control" name="organization name" value="@if(!is_null($financialInfo)){{$financialInfo->organization_name}}@endif">
                            
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