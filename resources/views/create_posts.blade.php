@extends('layout')
@section('title','Create Posts')



@section('content')

<div class="main">
<div class="container" >
<div class="row">

    <div class="col-lg-3"></div>
    <div class="col-lg-6">

    
<div id="ui">

<form class="form-group" id="postsForm" >

        <h1 class="text-center">Create Posts</h1><br><br>
                  
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter the Title"><br>
                  
                  <label for="content">Content:</label>                
                  <textarea class="form-control" rows = "5" cols = "50" name = "content" placeholder="Enter the content......"></textarea>
                   
                  <label for="author_id">Author</label>
                  <select name="author_id" class="form-control">
                      <option>Select Author</option>
                       @foreach($authors as $author)
                      <option value="{{$author->id}}">{{$author->name}}</option>
                       @endforeach
                  </select>
                  
                  <label for="category_id">Category</label>
                  <select name="category_id" class="form-control">
                  <option>Select Category</option>
                       @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                       @endforeach
                  </select>
                  
                  
                  <br><br><br>
</form>
                
<div class="button1">
    <button id="saveButton" class="btn btn-primary"  style="background-color:!important; color:white;width:140px;font-family:'Trebuchet MS', sans-serif; ">Add </button>
    <a href="{{url('/posts')}}" class="btn btn" style="background-color:#001f4d!important; color:white;width:140px;font-family:'Trebuchet MS', sans-serif; ">Back</a>
</div>
                  
</div>
</div>
<div class="col-lg-3"></div>

</div>
</div>
</div>
</div>
]

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
            formdata: $('#postsForm').serialize()
        }
            
        

        $.ajax({
        url: '{{url('/posts')}}',
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




