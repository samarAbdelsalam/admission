
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function () {
        @if(!is_null($academicDegree1))
            var selectedBscUniversity = {{$academicDegree1->university}};
            $('#mscUniversity').val(selectedBscUniversity);
        @endif    
        @if(!is_null($academicDegree2))
            var selectedMscUniversity = {{$academicDegree2->university}};
            $('#bscUniversity').val(selectedMscUniversity);
        @endif    
    
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 5 of 11 </h3><h2>Academic Background Degree</h2></div>
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
                    <form method="post" action="/academicBackground/save">
                          <input type="hidden" value="{{ csrf_token() }}" name="_token">
        
                        <h4><mark><b>BS.c Information</b></mark></h4>
                        <div class="form-group required">
                            <label class="control-label">University</label>
                            <select class="form-control" id="bscUniversity" name="BSc_university">
                                @foreach($universities as $university)
                                <option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Major</label>
                            <input type="text" class="form-control" value="@if( !is_null($academicDegree1)){{$academicDegree1->major}}@endif" name="BSc_major"/>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Department</label>
                            <input type="text"  name="BSc_department" class="form-control" value="@if(!is_null($academicDegree1)){{$academicDegree1->department}}@endif"/>
                        </div>                    
                        <div class="form-group required">
                            <label class="control-label">Faculty Name</label>
                            <input type="text"  name="BSc_faculty" class="form-control" value="@if(!is_null($academicDegree1)){{$academicDegree1->faculty}}@endif"/>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">GPA Percentage</label>
                            <input type="text"  name="BSc_GPA" class="form-control" value="@if(!is_null($academicDegree1)){{$academicDegree1->gpa}}@endif"/> 
                        </div>      
                        <div class="form-group required">
                            <label class="control-label">Thesis Name</label>
                            <input type="text"  name="BSc_thesis_name" class="form-control" value="@if(!is_null($academicDegree1)){{$academicDegree1->thesis}}@endif"/> 
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Rank</label>
                            <input type="text"  name="BSc_rank" class="form-control" value="@if(!is_null($academicDegree1)){{$academicDegree1->rank}}@endif"/> 
                        </div>    
                        <div class="form-group required">
                            <label class="control-label">Receive Date</label>
                            <input type="date"  name="BSc_receive_date" class="form-control" value="@if(!is_null($academicDegree1)){{$academicDegree1->date}}@endif"/> 
                        </div>
                        
                        
                        @if($applied_degree == "PhD")
                        <h4><mark><b>MS.c Information</b></mark></h4>
                        <div class="form-group required">
                            <label class="control-label">University</label>
                            <select class="form-control" id="mscUniversity" name="MSc_university">
                                @foreach($universities as $university)
                                <option value="{{$university->id}}">{{$university->name}}</option>
                                @endforeach
                            </select>
                        </div>
                         
                        <div class="form-group required">
                            <label class="control-label">Major</label>
                            <input type="text" class="form-control" value="@if( !is_null($academicDegree2)){{$academicDegree2->major}}@endif" name="MSc_major"/>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Department</label>
                            <input type="text"  name="MSc_department" class="form-control" value="@if(!is_null($academicDegree2)){{$academicDegree2->department}}@endif"/>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Faculty Name</label>
                            <input type="text"  name="MSc_faculty" class="form-control" value="@if(!is_null($academicDegree2)){{$academicDegree2->faculty}}@endif"/>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">GPA Percentage</label>
                            <input type="text"  name="MSc_GPA" class="form-control" value="@if(!is_null($academicDegree2)){{$academicDegree2->gpa}}@endif"/> 
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Thesis Name</label>
                            <input type="text"  name="MSc_thesis_name" class="form-control" value="@if(!is_null($academicDegree2)){{$academicDegree2->thesis}}@endif"/> 
                        </div>
                         <div class="form-group required">
                            <label class="control-label">Rank</label>
                            <input type="text"  name="MSc_rank" class="form-control" value="@if(!is_null($academicDegree2)){{$academicDegree2->rank}}@endif"/> 
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Receive Date</label>
                            <input type="date"  name="MSc_receive_date" class="form-control" value="@if(!is_null($academicDegree2)){{$academicDegree2->date}}@endif"/> 
                        </div>
                       
                        <div class="form-group">
                            <input type="submit" value="Save and Next" class="btn btn-primary pull-right">
                            <input type="button" value="Previous" class="btn btn-primary pull-left">
                        </div>
                         @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection