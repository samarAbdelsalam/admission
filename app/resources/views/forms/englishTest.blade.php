
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function(){
    @if (!is_null($englishTest))
       var selectedTest = "{{$englishTest->english_language_test}}";
       $('#test').val(selectedTest);
    @endif
    });


</script>
<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 6 of 14 </h3><h2>English Level</h2></div>
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
                    <form method="post" action="/englishTest/save">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group required">
                            <label class="control-label">English Test</label>
                            <select name="test" id="test" class="form-control">
                                <option value='Not Taken' >Not Taken</option>
                                <option value='iBT'>iBT</option>
                                <option value='iETLs'>IELTS</option>
                            </select>
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Score</label>
                            <input type="text" class="form-control" name="score" value="@if(!is_null($englishTest)){{$englishTest->score}}@endif">
                            
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