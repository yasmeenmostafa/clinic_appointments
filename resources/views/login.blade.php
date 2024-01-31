<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>clinic login</title>
        <link rel="stylesheet" href="{{asset('front/css/loginn.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">


       
        
    </head>
    
    <body>
        <div class="nav">

            <nav id="no" class="bg-transparent w-100">
            
                <h1 class="text-white">clinic</h1>
                <button type="button" class="ms-auto btn btn-outline-light"><a href="{{url('register')}}" class="text-decoration-none text-white">Register</a></button>

            </nav>
        </div>
        
        
    <div class="form row  mt-5">
            
            <div class="col-6">
            <img src="{{asset('images/home_img_wrap.png')}}"  class="w-75" alt="photo">
            </div>
       <div class="container col-6 justify-content-center">
        <h2 class="text-center mt-3">Login</h2>
        
        <form method="post" action="{{url('/login')}}">
            @csrf
        @include('inc/errors')
            <input type="text" class="form-control mt-5 w-75 mb-4 m-auto py-3 " id="formGroupExampleInput"  name="email" placeholder="email">

            <input type="password" class="form-control mt-5 w-75 mb-4 m-auto py-3 " id="formGroupExampleInput" name="password" placeholder="password">
            <button class="btn btn-outline-primary mb-3"  name="patient_login">Login</button>
            <h3 class="fs-6">Don't have an account ? <span style="color:#B0AEAE;"><a href="{{url('register')}}">Register now</a></span></h3>
        </form>

        </div>

    </div>
      

       

        
        
        
    </body>