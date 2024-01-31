<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinic appointments</title>
    <link rel="stylesheet" href="{{ asset('front/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
</head>

<body>
    <div>

        <nav id="no">

            <h1 class="text-white">clinic</h1>
            <button type="button" class="btn btn-outline-light"> <a class="text-decoration-none"
                    href="{{ url('logout') }}">Logout</a></button>
        </nav>
        @include('inc.suc')
    </div>




    <div class="block mt-5 ps-3 mb-5">




        <div class="textbox">

            <div class="doctorname">
                <h1>manger</h1>
            </div> <br>
            <div class="doc">admin</div> <br>
        </div>
    </div>

    <?php
    // require_once "handle/success.php";
    ?>


    <div class="container m-auto">

        <div class="border border-2  border-primary rounded-1 w-75 m-auto d-flex justify-content-center p-3 ">
            <form method="post" action="{{url('add_doctor')}}">
                @csrf
                <h1 class="text-center">Add a Doctor</h1>
                @include('inc.err')
                <input type="text" class="input" placeholder="Name" name="name"><br>
                <input type="text" class="input" placeholder="Email" name="email"><br>
                <input type="password" class="input" placeholder="password" name="password"><br>
                <input type="text" class="input" placeholder="phone" name="phone"><br>
                <input type="text" class="input" placeholder="address" name="address"><br>
                <label for="birthdate">birthdate</label>

                <input type="date" class="input" placeholder="birthdate" name="birthdate"><br>
                <div class="gender">
                    <span>gender:</span>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">female</label>
                </div>
                <button class="register" name="add-doctor">Register</button>

            </form>

        </div>

    </div>
    <div class="bg">
        <h1 class="text-center">contact messages</h1>

        <div class="con">





            @foreach ($messages as $message) 

                <div class='alert-primary'>
                    <div class='w-70'>
                        <p> name: {{ $message->name }}
                        <p>
                        <p> phone: {{ $message->phone }}
                        <p>
                        <p> message: {{ $message->message }}
                        <p>
                    </div>
                    <div>
                        <button> <a href='{{url('message/'.$message->id)}}'>delete</a></button>
                    </div>
                </div>
                @endforeach

              


        </div>
    </div>

    <div class="">
        <h1 class="text-center">Our Doctors</h1>

        <div class="cont">


            <table>
                <div class="first">
                    <thead>
                        <td>Name</td>
                        <td> Email</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>gender</td>
                        <td></td>


                    </thead>

                </div>



               
                    @foreach ($doctors as $doctor) 
                       
                
                        <tr>
                            <td>{{ $doctor['name'] }}</td>
                            <td>{{ $doctor['email'] }}</td>
                            <td>{{ $doctor['phone'] }}</td>
                            <td>{{ $doctor['address'] }}</td>
                            <td>{{ $doctor['gender'] }}</td>
                            <td><button> <a href='{{url('doctor/'.$doctor->id)}}'>delete</a> </button></td>
                
                        </tr>
                
                  @endforeach
            </table>


        </div>

    </div>
    </div>


</body>

</html>
