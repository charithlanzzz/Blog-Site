@extends('layout')
@section('title','Authors')


@section('content')

<center>
<div class="main" >
<h1 class="text-center" style="font-family:'Trebuchet MS', sans-serif;margin-left:0px;"> Authors </h1><br><br>
<div class="container" >



<table  id="authorstable" class="display"  style="width: 100%; ">
                <thead>
                <tr>   
                      <th >id:</th>
                      <th >Name:</th>
                      <th width="45%">Description:</th>
                      <th width="25%">Action</th>
                </tr>   
                </thead>    
             
                <tbody>
               </tbody>
                     
</table>

                   <button onclick="goBack()" class="btn btn" style="background-color:#001f4d!important; color:white;width:140px" >Back</button>
                   


                   

</div>
</div>
<div class="col-lg-3"></div>

</div>
</div>
</div>         

</div>
@endsection





@section('javaScript')
<script>
  function goBack() {
  window.history.back();
}
</script>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


<script type="text/javascript">
$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
</script> 

<script type="text/javascript">
    
    $(document).ready(() => {
            window.authors_table = $('#authorstable').DataTable({
                processing: true,
                serverSide: true,
                columns: [
                    {data: 'id', 'bVisible': false},
                    {data: 'name'},
                    {data: 'description'},
                    {data: 'action'},
                ],
                ajax: {
                    "url":'{{url('/get_authors_list')}}',
                    "type": "POST",
                    
                }
            });
        });
        

        $('#authorstable').on('click','.btn_delete', function(){
       var author_id = $(this).data('id');
       
       var delete_confirm = $.confirm({
            title: 'Confirm!',
            content: 'Simple confirm!',
            buttons: {
               
                cancel: function () {
                },
               
                somethingElse: {
                    text: 'Delete',
                    type: 'red',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function(){
                        
                        $.ajax({
                            url: '{{url('/authors')}}' + '/'+ author_id,
                            type: 'DELETE',
                            dataType: 'JSON',
                            success: function (response) {
                                alert(response.msg);
                                
                                 window.authors_table.ajax.reload();
                                 delete_confirm.close();
                                 
                            },
                            error: function (errors) {
            
                             }
                        });
                       return false;
                    }
                }
            }
       });

       
    });


    $('#authorstable').on('click','.btn_view', function(){
       var author_id = $(this).data('id');
       
       var view_confirm = $.confirm({
            title: 'View!',
            content: 'url:'+'/view_author_posts/' + author_id,
            buttons: {
               
                cancel: function () {
                },
            }
       });

       
    });
</script>    

@endsection

