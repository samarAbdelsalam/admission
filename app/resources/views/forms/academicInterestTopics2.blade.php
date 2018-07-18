
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function(){
        @if(!is_null($selectedDept2) )
            var selectedDept = "{{$selectedDept2}}"
            $('#department').val(selectedDept);
            //Fill the topics dropdown with the selected department's topics
            @foreach($topics as $topic)
                $('#topics').append('<option value="{{$topic->id}}">{{$topic->name}}</option>');
            @endforeach
            //set the selected topics
            @foreach($selectedTopics as $topic)
                $("#topics option[value = '{{$topic->topic_id}}']").prop('selected','selected');
            @endforeach
        @endif    
        $('#remove').click(function(){
           $.ajax({
              url:'/academicInterest/removeDept',
              type:'post',
              data:{'_token':'{{csrf_token()}}'},
              success: function(response){
                  if(response.success == true){
                      $('#topics').clear();
                      
                  }
              }
           });
           
        });
        
    });
</script>

<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 7 of 14 </h3><h2>Academic Interest Second Desired Department</h2></div>
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
                    <form method="post" action="/academicInterest/saveTopic2">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group required">
                            <label class="control-label">Department</label>
                            <select name="department" id="department" class="form-control" onchange="getTopics(this.value,'topics')">
                                <option value="">Select Department</option>
                                @foreach($departments as $dept)
                                <option value="{{$dept->id}}">{{$dept->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-group required">Topics</label>
                            <select name="topics[]" id="topics" multiple class="form-control">
                                <option value="">Select Topics</option>
                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="button" class="btn btn-danger" value="remove" id="remove">
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