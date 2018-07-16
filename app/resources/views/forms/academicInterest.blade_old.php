
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function(){
        $('#add_topic').click(function(){
            var selectedDeptID = $('#dept').val();
            var selectedDeptName = $('#dept option:selected').text();
            var selectedTopicID = $('#topics').val();
            var selectedTopicName = $('#topics option:selected').text();
            
             if( $('#selected_topics .'+selectedDeptID).length >3){
                 alert('Only three topics per departments are allowed');
             }else{
                 //send ajax call to save the topic 
                 $.ajax({
                     url: '/academicReseachTopics/saveTopic',
                     data: {'topic_id':selectedTopicID,'dept_id':selectedDeptID,"_token": "{{ csrf_token() }}"},
                     type: 'post',
                    success:function(response){
                        if(response.success == true){
                            $('#selected_topics tbody').append('<tr> <td>'+selectedDeptName +'</td> <td id = '+selectedTopicID+'>'+ selectedTopicName +'</td> <td><input type="button" class="btn btn-danger remove" value="Remove" /> </td> </tr>');
                        }else{
                            alert(response.message);
                        }
                    }
                });
                 
             }
         
        });
        
        $('body').delegate('.remove','click',function(){
            //get the topic id 
            //ajax call to remove the topic
            //on success remove the topic from the hidden field and from the table
            //reduce the counter
            
            var topicId = $(this).parent().id;
            $.ajax({
               url: '/academicReseachTopics/remove' ,
               type: 'post',
               data: {"topicId":topicId,"_token": "{{ csrf_token() }}"},
               success:function(response){
                  
                   $('#selected_topics tbody #'+topicId).parent().remove();
               }
            });
        });
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
                        <table class="table" id="selected_topics">
                            <thead>
                               <tr>
                                 <th>Department</th>
                                 <th>Research Topic</th>
                                 <th>Manage</th>
                               </tr>
                             </thead>
                             <tbody>
                                 
                             </tbody>
                        </table>
                        
                        <div class="form-group required">
                            <label class="control-label">Major </label>
                            <select name="major" class="form-control" onchange="getDepartments(this.value,'dept')">
                                <option value="">Select Major</option>
                                @foreach($major as $m)
                                <option value="{{$m->id}}">{{$m->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group required">
                            <label class="control-label">Departments </label>
                            <select id="dept" name="departments" class="form-control" onchange="getTopics(this.value,'topics')"> 
                                <option value="">Select departments</option>
                            </select>
                                
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Topics</label>
                            <select id="topics" name="topics" class="form-control" > 
                                <option value="">Select departments</option>
                            </select>
                                
                        </div>
                        <div class="form-group">
                            <input type="button" value="Add Topic" id="add_topic" class="btn btn-success">
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