
@extends('layouts.forms')

@section('content')
<script>
    $(document).ready(function () {


    });


</script>
<div class="container">
    <div class="row">

        <div class="col-md-8 form-container">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Step 13 of 14 </h3><h2>Reference Information</h2></div>
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
                    <form method="post" action="/reference/save">
                        <h3><mark><b>Reference Information 1</b></mark></h3>

                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class = "form-group required">
                            <label class="label-control">First Name</label>
                            <input type="text" class="form-control" name="reference_1_first_name" value="@if(!is_null($reference1)){{$reference1->fname}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Middle Name</label>
                            <input type="text" class="form-control" name="reference_1_middle_name" value="@if(!is_null($reference1)){{$reference1->mname}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Last Name</label>
                            <input type="text" class="form-control" name="reference_1_last_name" value="@if(!is_null($reference1)){{$reference1->lname}}@endif">
                        </div>   
                        
                        <div class = "form-group required">
                            <label class="label-control">Affiliation</label>
                            <input type="text" class="form-control" name="reference_1_affiliation" value="@if(!is_null($reference1)){{$reference1->affiliation}}@endif">
                        </div>
                        
                        <div class = "form-group required">
                            <label class="label-control">Position</label>
                            <input type="text" class="form-control" name="reference_1_position" value="@if(!is_null($reference1)){{$reference1->position}}@endif">
                        </div>
                          <div class = "form-group required">
                            <label class="label-control">Mobile</label>
                            <input type="text" class="form-control" name="reference_1_mobile" value="@if(!is_null($reference1)){{$reference1->mobile}}@endif">
                        </div>
                          <div class = "form-group required">
                            <label class="label-control">Phone</label>
                            <input type="text" class="form-control" name="reference_1_phone" value="@if(!is_null($reference1)){{$reference1->telephone}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Email</label>
                            <input type="text" class="form-control" name="reference_1_email" value="@if(!is_null($reference1)){{$reference1->email}}@endif">
                        </div>
                        <h3><mark><b>Reference Information 2</b></mark></h3>
                        <div class = "form-group required">
                            <label class="label-control">First Name</label>
                            <input type="text" class="form-control" name="reference_2_first_name" value="@if(!is_null($reference2)){{$reference2->fname}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Middle Name</label>
                            <input type="text" class="form-control" name="reference_2_middle_name" value="@if(!is_null($reference2)){{$reference2->mname}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Last Name</label>
                            <input type="text" class="form-control" name="reference_2_last_name" value="@if(!is_null($reference2)){{$reference2->lname}}@endif">
                        </div>  
                        
                        <div class = "form-group required">
                            <label class="label-control">Affiliation</label>
                            <input type="text" class="form-control" name="reference_2_affiliation" value="@if(!is_null($reference2)){{$reference2->affiliation}}@endif">
                        </div>
                        
                        <div class = "form-group required">
                            <label class="label-control">Position</label>
                            <input type="text" class="form-control" name="reference_2_position" value="@if(!is_null($reference2)){{$reference2->position}}@endif">
                        </div>
                          <div class = "form-group required">
                            <label class="label-control">Mobile</label>
                            <input type="text" class="form-control" name="reference_2_mobile" value="@if(!is_null($reference2)){{$reference2->mobile}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Phone</label>
                            <input type="text" class="form-control" name="reference_2_phone" value="@if(!is_null($reference2)){{$reference2->telephone}}@endif">
                        </div>
                        
                        <div class = "form-group required">
                            <label class="label-control">Email</label>
                            <input type="text" class="form-control" name="reference_2_email" value="@if(!is_null($reference2)){{$reference2->email}}@endif">
                        </div>
                         <h3><mark><b>Reference Information 3</b></mark></h3>
                        
                        <div class = "form-group required">
                            <label class="label-control">First Name</label>
                            <input type="text" class="form-control" name="reference_3_first_name" value="@if(!is_null($reference3)){{$reference3->fname}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Middle Name</label>
                            <input type="text" class="form-control" name="reference_3_middle_name" value="@if(!is_null($reference3)){{$reference3->mname}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Last Name</label>
                            <input type="text" class="form-control" name="reference_3_last_name" value="@if(!is_null($reference3)){{$reference3->lname}}@endif">
                        </div>  
                        
                        <div class = "form-group required">
                            <label class="label-control">Affiliation</label>
                            <input type="text" class="form-control" name="reference_3_affiliation" value="@if(!is_null($reference3)){{$reference3->affiliation}}@endif">
                        </div>
                        
                        <div class = "form-group required">
                            <label class="label-control">Position</label>
                            <input type="text" class="form-control" name="reference_3_position" value="@if(!is_null($reference3)){{$reference3->position}}@endif">
                        </div>
                          <div class = "form-group required">
                            <label class="label-control">Mobile</label>
                            <input type="text" class="form-control" name="reference_3_mobile" value="@if(!is_null($reference3)){{$reference3->mobile}}@endif">
                        </div>
                        <div class = "form-group required">
                            <label class="label-control">Phone</label>
                            <input type="text" class="form-control" name="reference_3_phone" value="@if(!is_null($reference3)){{$reference3->telephone}}@endif">
                        </div>                        
                        <div class = "form-group required">
                            <label class="label-control">Email</label>
                            <input type="text" class="form-control" name="reference_3_email" value="@if(!is_null($reference3)){{$reference3->email}}@endif">
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