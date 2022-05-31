@extends('layout')
@section('title','Create Catogories')




@section('content')

<div class="main">
    <div class="container" >
    <div class="row">
    
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
    
        
    <div id="ui">
    
    <form class="form-group" id="categoriesForm" >
    
            <h1 class="text-center">Create Categories</h1><br><br>
                      
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" name="name" placeholder="Enter the Name"><br>
                      
                      <label for="description">Description:</label>                
                      <textarea class="form-control" rows = "5" cols = "50" name = "description" placeholder="Enter the description......"></textarea>
                       
                      <br><br><br>
    </form>
    
                    
    <div class="button1">
        <button id="saveButton" class="btn btn-primary"  style="background-color:!important; color:white;width:140px;font-family:'Trebuchet MS', sans-serif; ">Add </button>
        <a href="{{url('/categories')}}" class="btn btn" style="background-color:#001f4d!important; color:white;width:140px;font-family:'Trebuchet MS', sans-serif; ">Back</a>
    </div>
                      
    </div>
    </div>
    <div class="col-lg-3"></div>
    
    </div>
    </div>
    </div>
    </div>
    <br><br><br><br><br>
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
    $('#saveButton').click(function (e) {
        //collect form data
        
        e.preventDefault();

        // var data = {
        // title: $('#title').val(),
		// content:$('#content').val() ,
			
	    var data = {
            formdata: $('#categoriesForm').serialize()
        }
            
        

        $.ajax({
        url: '{{url('/categories')}}',
        type: 'POST',
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
