
    

  @extends('layout')
  @section('title','Update Posts')
  
  
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
        
        
        <form  method="post" id="postsUpdateForm">
          @method('PUT')
        {{csrf_field()}} 
        
        <h1 class="text-center">Update Posts</h1><br><br>
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" name="title" value="{{$postsdata->title}}"/><br>
                  

                  <label for="content">Content:</label>
                  <input type="text" rows = "5" cols = "50" class="form-control" name="content" value="{{$postsdata->content}}"/><br>
                  
                  <label for="author_id">Author Id:</label>
                  <!-- <input type="text" class="form-control" name="author_id" value="{{$postsdata->author_id}}"/><br> -->

                  <select name="author_id" class="form-control" >
                  <option>Select Author</option>
                       @foreach($authors as $author)
                        <option value="{{$author->id}}"{{ ($postsdata->author_id == $author->id) ? 'selected' : '' }}>{{$author->name}}</option>
                       @endforeach                      
                  </select><br>

                  <label for="category_id">Category Id:</label>
                  <!-- <input type="text" class="form-control" name="category_id" value="{{$postsdata->category_id}}"/><br> -->
                  
                  <select name="category_id" class="form-control">
                  <option>Select Category</option>
                       @foreach($categories as $category)
                        <option value="{{$category->id}}"{{ ($postsdata->category_id == $category->id) ? 'selected' : '' }}>{{$category->name}}</option>
                       @endforeach
                       
                  </select><br>
                  <input type="hidden" name="id" value="{{$postsdata->id}}"/>
                  
                  
                       
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
            formdata: $('#postsUpdateForm').serialize()
        }
            
        

        $.ajax({
        url: '{{url('/posts/'.$postsdata->id)}}',
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









