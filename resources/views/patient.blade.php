<?php
// require_once"./handle/conn.php";
// if(isset($_GET['id'])){

//     $patient_id=$_GET['id'];

//     $query="select * from patients where id='$patient_id'";
//       $runquery=mysqli_query($conn,$query);
//       if(mysqli_num_rows($runquery)>0){
//         $appointments=printdata($conn,'appointments',$patient_id);
//         $prescriptions=printdata($conn,'prescriptions',$patient_id);
//       }
//       else{
//         $errors[]= "login first";
//         $_SESSION['errors']=$errors;
//          header("location:index.php");
//       }
// }

// function printdata($conn,$table,$id){
//     $query="select * from $table where patient_id='$id'";
//     $runquery=mysqli_query($conn,$query);
//     // $runquery=mysqli_fetch_assoc($runquery);
//     if(mysqli_num_rows($runquery)>0){
//         return $runquery;
//   }
//   else{
//     // $errors[]= "no".$appointments;
//     // $_SESSION['errors']=$errors;
//     //  header("location:patient.php");

//   }

// }
?>




<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/style.css?v="> -->

    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Poppins&display=swap" rel="stylesheet">


</head>
<nav class="navbar navbar-expand-lg nav w-100 position-fixed position-relative ">
    <div class="container-fluid">
        <a class="navbar-brand ps-5" href="#">
            <h3 class="text-white">clinic</h3>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{url('home')}}">Home</a>
                </li>

                <a href="{{url('logout')}}" class="btn btn-outline-light"> Logout</a>



            </ul>

        </div>
    </div>
    <div class="position-absolute top-100 w-100">
    </div>
</nav>
<section class="container m-auto p-3 mt-5">
    <div class="row mt-4">

        <div class="col-md-6">

            <h2 class="text-primary mb-2 pb-4">
                MY Appointments
                @foreach ($appointments as $appointment)
                    <div class='alert alert-primary' role='alert'>
                        <h4>time :{{ $appointment['time'] }} </h4>
                        <h4>date :{{ $appointment['date'] }} </h4>
                    </div>
                @endforeach

        </div>

        <div class="col-md-6">

            <h2 class="text-primary mb-2 pb-4 ">
                MY Prescriptions
@if(!empty($prescriptions))
    @foreach ($prescriptions as $prescription)
    <div class='alert alert-primary' role='alert'>

    <h4>Prescription </h4>
        <p class='lead'>drug_name:{{ $prescription['drug_name'] }}</p>
        <p class='lead'>drug_time:{{ $prescription['drug_time'] }}</p>
        <p class='lead'>drug_dosage:{{ $prescription['drug_dosage'] }}</p>
    </div>
    @endforeach

@endif

              




        </div>

    </div>

</section>
