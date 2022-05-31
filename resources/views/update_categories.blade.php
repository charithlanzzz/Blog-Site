@extends('layout')
@section('title','Update Category')


@section('content')


<div class="main">
<div class="container" >


    <div class="row">

    <div class="col-lg-3"></div>
    <div class="col-lg-6">

    @foreach($errors->all() as $error)
    <div class= "alert alert-danger" role="alert" style="padding:2px 2px;">
    {{$error}}
    </div>
    @endforeach  
        <div id="ui">
        <form  method="post" id="categoriesUpdateForm" >
          @method('PUT')
        {{csrf_field()}} 
        
        <h1 class="text-center">Update Categories</h1><br><br>
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="name" value="{{$categoriesdata->name}}"/><br>
                  

                  <label for="description">Description:</label>
                  <input type="text" rows = "5" cols = "50" class="form-control" name="description" value="{{$categoriesdata->description}}"/><br>
                  
                

                  <input type="hidden" name="id" value="{{$categoriesdata->id}}"/>
                  
                  
                </form>

                <div class="button1">
                  <button id="updateButton" class="btn btn-primary"  style="background-color:!important; color:white;width:140px;font-family:'Trebuchet MS', sans-serif; ">Update </button>
                  <button onclick="goBack()" class="btn btn" style="background-color:#001f4d!important; color:white;width:140px" >Back</button>
                </div>

        </div>
</div>
<div class="col-lg-3"></div>

</div>
</div>
</div>



                  
                        

</div>
@endsection


@section('javaScript')

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript">
$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
</script>

<script>
$(document).ready(function(){
    $('#updateButton').click(function (e) {
        //collect form data
        
        e.preventDefault();

        // var data = {
        // title: $('#title').val(),
		// content:$('#content').val() ,
			
	    var data = {
            formdata: $('#categoriesUpdateForm').serialize()
        }
            
        

        $.ajax({
        url: '{{url('/categories/'.$categoriesdata->id)}}',
        type: 'PUT',
        dataType: 'JSON',
        data: $.param(data),
        success: function (response) {
            alert(response.msg);
           // window.location.href='{{url('/posts')}}';
        },
        error: function (errors) {
            
        }
    });
    return false;
    });
});
</script>

@endsection








