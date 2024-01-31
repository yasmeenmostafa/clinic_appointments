<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>clinic appointments</title>
         <link rel="stylesheet" href="{{asset('front/css/doctor.css')}}">
         <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    </head>
    <body>
        <div>

            <nav id="no">
            
                <h1 class="text-white">clinic</h1>
            <button type="button" class="btn btn-outline-light"><a class='text-decoration-none text-white' href="{{url('logout')}}">Logout</a></button>
            </nav>
        </div>
               
        
@include('inc.errors')
        

        <div class="block"> 
            
              
            
            
        
            <div class="textbox">
               
                <div class="doctorname"><h2>Dr {{Auth::user()->name}}</h2></div> <br>
                 <div class="doc">Doctor</div> <br> 
            </div>
        </div>

 
        <div class="container text-primary">
            
            
            <table >
                <div class="first">
                <tr>
                    <td>visit Number</td>
                    <td>patient Email</td>
                    <td>patient Name</td>
                    <td>gender</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td></td>
                    <td></td>
                    
                </tr>
            </div>
           
                       @foreach($appointments as $appointment)
                           <div class='second'>
                                <tr>
                                   
                                    <td>{{$appointment->id}}</td>
                                    <td>{{$appointment->pemail}}</td>
                                    <td>{{$appointment->pname}}</td>
                                    <td>{{$appointment->date}}</td>
                                    <td>{{$appointment->time}}</td>
                                    
                                   
                                    <td><button name='' class='btn btn-outline-primary' ><a class='text-decoration-none text-primary' href='{{url('appointment/'.$appointment->id)}}'> Finish</a></button></td> 
                                    <form method="post" action="{{url('prescription')}}">
                                        @csrf
                                        <input type="hidden" value="{{$appointment->patient_id}}" name="patient_id">
                                        <input type="hidden" value="{{$appointment->id}}" name="appointment_id">
                                    <td><button name=''class='btn btn-outline-primary'  ><a  class='text-decoration-none text-primary'> prescription</a></button></td>      
                                        
                                    </form>     
                                    <td></td> 
                                    </form>     
                                </tr>
                            </div>
                            @endforeach


                

                </table>
           
        </div>
  
        
    </body>
</html>