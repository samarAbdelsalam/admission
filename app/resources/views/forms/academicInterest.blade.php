
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function(){
        @if(!is_null($academicInterest))
            var selectedMajor = "{{$academicInterest->major}}";
            $('#major').val(selectedMajor);
            
            var semester = "{{$academicInterest->semester}}";
            $('#semester').val(semester);
            
            var degree = "{{$academicInterest->applied_degree}}";
            $('#degree').val(degree);
        @endif    
    });
</script>

<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 6 of 14 </h3><h2>Academic Interest</h2></div>
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
                    <form method="post" action="/academicInterest/save">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group required">
                            <label class="control-label">Major</label>
                            <select name="major" id="major" class="form-control" onchange="getDepartments(this.value,'dept')">
                                <option value="">Select Major</option>
                                @foreach($major as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-group required">Semester</label>
                            <select name="semester" id="semster" class="form-control">
                                <option name="fall">Fall</option>
                                <option name="spring">Spring</option>
                            </select>
                        </div>
                        <div class="from-group">
                            <label class="form-group required">Applied Degree</label>
                            <select name="degree" id="degree" class="form-control">
                                <option name="MSc">MSc</option>
                                <option name="phD">PhD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save and Next" class="btn btn-primary pull-right">
                            <input type="button" value="Previous" class="btn btn-primary pull-left">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection