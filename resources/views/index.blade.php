
<?php 
// require_once"handle/conn.php";
 
//  if(isset($_SESSION['patient_id'])){
//     $id=$_SESSION['patient_id'];
//  }

?>


<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/style.css?v="> -->

    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Poppins&display=swap" rel="stylesheet">


</head>

<body>

    <header class="vh-100 w-100  " id="home">
        <div class="layer w-100 h-100  d-flex  align-items-center flex-wrap">
            

            <div class=" ms-5 headertitle  ">



                <h1>FIND DOCTOR &<br>
                    BOOK APPOINTMENT </h1><br>
                <!-- <h2> </h2> -->
                <p class="mt-0 pt-0">since the first days of operation of modify,<br>
                    our team has been focused on building a high-qualitys<br>
                    medicals service by clinic</p>
            </div>

            <nav class="navbar navbar-expand-lg nav w-100 position-fixed position-relative ">
                <div class="container-fluid">
                    <a class="navbar-brand ps-5 text-white fs-3" href="#">clinic</a>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active  text-white" aria-current="page" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active  text-white" aria-current="page" href="#about">Make Appointments</a>
                            </li>
                            
                            
                            <li class="nav-item">
                                <a class="nav-link active  text-white" aria-current="page" href="#blog">Doctors</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-white " aria-current="page" href="#contact">CONTACT</a>
                            </li>
                            @if(Auth::user())
                                
                           
                          
                             <li class='nav-item dropdown'>
                                 <a class='nav-link dropdown-toggle text-white' href='#home' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                     My Account
                                 </a>

                                  <ul class='dropdown-menu'>
                                     <li><a class='dropdown-item text-primary' href='{{url('/info')}}'>My Prescriptions</a></li>
                                     <li><a class='dropdown-item text-primary' href='{{url('/info')}}'> My Appointments</a></li>
                                    
                                 </ul>
                                
                             </li>
                             <button class='btn btn-outline-light'><a href='{{url('logout')}}' class='text-decoration-none '> Logout</a></button>
                             @endif
                            
                            @if(!Auth::user())

                      <button class='btn btn-outline-light'><a href='{{route('loginform')}}' class='text-decoration-none '> login</a></button>
                      <button class='btn btn-outline-light'><a href='{{route('register')}}' class='text-decoration-none '> register</a></button>
                            
                               @endif     
                       

                        </ul>

                    </div>
                </div>
                <div class="position-absolute top-100 w-100">
                    @include('inc.suc')
      
            </div>
           
           
            </nav>
            
        </div>
       

    </header>
    
    <section class="about   h-md-auto  d-flex align-items-center py-5" id="about">

        <div class="row w-100 align-items-center">
            <div class="  col-md-6 col-sm-12  d-flex justify-content-center">
                <img src="{{asset('images/WhatsApp Image 2023-05-01 at 22.54.51.jpeg')}}" class="w-75 m-auto " alt="">




            </div>
            <div class="col-md-6 col-sm-12 abouttitle p-3">
                <div class="m-3 border border-1 p-3 rounded-1 blue ">
                    <h3 class="position-relative">Make An Appointment
                    </h3>

                    @include('inc.err')

                    
                    <form class="ff" method="post" action="{{url('/appointment')}}">
                        @csrf
                        <div class="mb-3">

                            <input type="text" name="pname" class="form-control mt-5" id="formGroupExampleInput" placeholder="Your Name">
                        </div>
                        <div class="mb-3">

                            <input type="text"name="pemail" class="form-control" id="formGroupExampleInput2" placeholder="Your Email">
                        </div>
                        <select class="form-select mb-3" aria-label="Default select example" name='doctor_id'>
                            <option selected>Choose doctor by name</option>
                           

                          @foreach($doctors as $doctor)
                            <option value='{{$doctor['id']}}'>Dr {{$doctor['name']}}</option>
                          @endforeach
                            
                            
                        </select>
                        <div class="d-flex">
                            <div class="mb-3 w-50">

                                <input type="time" name="time" class="form-control me-2" id="formGroupExampleInput2" placeholder="Time">
                            </div>

                            <div class="mb-3 w-50">

                                <input type="date" name="date" class="form-control ms-2 " id="formGroupExampleInput2" placeholder="Date">
                            </div>
                        </div>
                        <div class="d-flex">
                            <p class="blue pe-4"> Gender:</p>
                            <div class="form-check w-50">
                                <input class="form-check-input" type="radio" value="female" name="gender" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Female
                                </label>
                            </div>
                            <div class="form-check w-50">
                                <input class="form-check-input" type="radio" value="male" name="gender"  id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Male
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary  rounded-1 p-2 px-4 mt-3 " name="submit">SUBMIT
                                </button>
                            </div>



                        </div>
                    </form>
                </div>
            </div>

    </section>



    <section class="numbers w-100  me-0 " id="blog">
        <div class="servicetitle text-center p-5   position-relative bg-light blue">
            <h2>OUR DOCTORS</h2>

        </div>
        <div class="layer2  row px-5 bg-light blue py-5 mx-0 row align-items-center justify-content-center h-100 w-100 blue">
            <div class="col-md-3 p-3 text-center">
                <img src="{{asset('images/WhatsApp Image 2023-05-01 at 04.09.34 (1).jpeg')}}" class="w-75 m-auto rounded-circle" alt="">
                <h5 class=" pt-3">DOCTOR</h5>
            </div>
            <div class="col-md-3 p-3 text-center">
                <img src="{{asset('images/WhatsApp Image 2023-05-01 at 04.09.34 (3).jpeg')}}" class="w-75 m-auto rounded-circle" alt="">
                <h5 class=" pt-3">DOCTOR</h5>
            </div>
            <div class="col-md-3 p-3 text-center">
                <img src="{{asset('images/WhatsApp Image 2023-05-01 at 04.09.34 (2).jpeg')}}" class="w-75 m-auto rounded-circle" alt="">
                <h5 class=" pt-3">DOCTOR</h5>
            </div>
            <div class="col-md-3 p-3 text-center">
                <img src="{{asset('images/WhatsApp Image 2023-05-01 at 04.09.34.jpeg')}}" class="w-75 m-auto rounded-circle" alt="">
                <h5 class=" pt-3">DOCTOR</h5>
            </div>


        </div>
    </section>



    <section class="testimonials contact shadow-lg " id="contact">
        <div class=" layer2 d-flex align-items-center justify-content-between py-5 h-100 w-100 text-white">
            <div class="container row pt-5 h-75 bg-white m-auto text-black">
                <div class="col-md-6 pe-4">
                    <form action="{{url('/contactus')}}" method="post">
                        @csrf
                        <h3 class="position-relative">Send Message Us
                        </h3>

                        <div class="mb-3">

                            <input type="text" class="form-control mt-5" id="formGroupExampleInput" name="name" placeholder="Your Name">
                        </div>
                        <div class="mb-3">

                            <input type="text" class="form-control" id="formGroupExampleInput2" name="phone" placeholder="Your Phone">
                        </div>
                        <div class="mb-3">


                            <textarea type="text" class="form-control mt-4" id="formGroupExampleInput2" name="message" placeholder=""></textarea>
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary mt-4 px-4 py-3 rounded-pill " name="submit">Send
                                    meassage</button>
                            </div>
                        </div>
                    </form>




                </div>
                <div class="col-md-6 ">
                    <h3 class="position-relative">Get In Touch
                    </h3>
                    <p class="lead mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum
                        dolorem
                        soluta quidem expedita aperiam aliquid at. Totam magni ipsum suscipit amet? Autem nemo esse
                        laboriosam ratione nobis mollitia inventore?</p>
                    <ul class="ps-0">
                        <li> <i class="fa-solid fa-location-dot contacticons"></i> <span> 329 WASHINGTON ST BOSTON, MA
                                02108
                            </span></li>
                        <li> <i class="fa-solid fa-phone contacticons"></i> <span> (617) 557-0089
                            </span></li>
                        <li> <i class="fa-solid fa-envelope contacticons"></i> <span> contact@example.com
                            </span></li>
                    </ul>
                    <div class="d-flex ">
                        <div class="contacticon2 d-flex justify-content-center align-items-center rounded-circle m-2">
                            <i class="fa-brands fa-facebook "></i>
                        </div>
                        <div class="contacticon2 d-flex justify-content-center align-items-center rounded-circle  m-2">
                            <i class="fa-brands fa-instagram "></i>
                        </div>
                        <div class="contacticon2 d-flex justify-content-center align-items-center rounded-circle  m-2">
                            <i class="fa-brands fa-twitter "></i>
                        </div>
                        <div class="contacticon2 d-flex justify-content-center align-items-center rounded-circle  m-2">
                            <i class="fa-brands fa-linkedin-in "></i>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <footer class="text-center text-white d-flex justify-content-center align-items-center shadow-lg ">
        © Copyright clinic. All Rights Reserved
        <br>
        Designed by BootstrapMade
    </footer>






    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>