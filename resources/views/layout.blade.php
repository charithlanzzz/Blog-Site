<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    
    <style>
        .footer {position: absolute; right:0; left: 0;bottom: 0; width: 100%; background-color:  #148DDD;color: white;text-align: center;text-align: center;}.header {overflow: hidden;background-color: dodgerblue;padding: 20px 10px;}
        .header a { float: left;color: white;text-align: center;padding: 10px;text-decoration: none;font-size: 20px; line-height: 25px;border-radius: 4px; }.header a.logo {font-size: 30px;font-weight: bold;}
        .headerlogo{padding-bottom:40px;padding-left:5px;	}  
        .header a:hover {background-color: #45A7E9;color: black;} .header a.active {color: black;}.header-right {float: right;}@media screen and (max-width: 500px) {.header a {float: none;display: block;text-align: left;}  .header-right {float: none; padding-top: 5%;}}
        #body {padding: 10px;/*padding-top: 8%; */padding-bottom: 25%; /* Height of the footer */}
   
.header {
	background-image: url("/images/bg3.png");
	background-size: cover;
	width: 100%;
	height: 300px;
	background-position : center;
	background-repeat: no-repeat;
    } 

body {
  background-image: url('images/transport_images/bg6.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  }

#ui
  {
      background:#;
      padding:90px 120px;
      width:800px;
      border-style:solid;
      margin-left:-40px;
      border-radius:10px;
      opacity:1;
  }

#ui label
  {
      color:#333;
      font-family:'Trebuchet MS', sans-serif; 
  }
      
#ui h1
  {
      padding-top:8px;
      margin-left:-16px;
      margin-top:-80px;
      border-radius:5px;
      font-family:'Trebuchet MS', sans-serif; 
  }

.main {
  margin-left: -40px; /* Same as the width of the sidenav */
   /* Increased text to enable scrolling */
  padding: 0px 10px;
  margin-top: -1048px;
}


    </style>
    <title>@yield('title')</title>
</head>



<body>
<header>
<div class="header">
    
    <div class="btn-group" role="group" style="float:right; background-color:#006699!important;">
        
        <a class="" href="{{url('/posts/create')}}">Create posts</a>
        <a class="" href="{{url('/posts')}}">Retrieve posts</a>
        <a class="" href="{{url('/authors/create')}}">Create authors</a>
        <a class="" href="{{url('/authors')}}">Retrieve authors</a>
        <a class="" href="{{url('/categories/create')}}">Create Categories</a>
        <a class="" href="{{url('/categories')}}">Retrieve Categories</a>

        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button style="background-color:#3385ff!important;"class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>   
       
       
        
    
    
</div>
</header>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@yield('content')

<br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<footer class = "clearfix"  style = "width: 100%; padding: 40px; background-color: #1E5981; color:white; ">


		<table style = "width: 100%; margin-left:150px;">
                <th width="33%">Services</th> 
                <th width="33%">Contact Us</th> 
                <th width="33%">Follow Us On,</th> 	
        
           
						
				</td>
			</tr>
		</table>		

 <div width="100%">	
			
		<p align="center">© 2021 News (Pvt)Ltd.
			<br>All rights reserved
			<br>Website Developed and Designed by Charith
		</p>						
</div>
</footer>

@yield('javaScript')

<script>
  function goBack() {
    window.history.back();
  }
  </script>

</body>
</html>