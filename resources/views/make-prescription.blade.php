<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg nav w-100 position-fixed position-relative ">
        <div class="container-fluid">
            <a class="navbar-brand ps-5" href="#">
                <h3 class="text-white">clinic</h3>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page"
                            href="{{ url('doctorview') }}">Home</a>
                    </li>





                </ul>

            </div>
        </div>
        <div class="position-absolute top-100 w-100">
        </div>
    </nav>





    <div class="row mt-5 justify-content-center align-items-center  ">
        <div class="col-md-6 pe-4 border border-primary p-3 border-2 rounded-1 mt-5">

            <h3 class="position-relative">make prescription
            </h3>
            @include('inc.errors')

            <form action="{{ url('adddrug') }}" method="post">
                @csrf
                <div class="mb-3">

                    <input type="text" class="form-control mt-5" id="formGroupExampleInput" name="drug_name"
                        placeholder="Drug Name">
                </div>
                <div class="mb-3">

                    <input type="text" class="form-control" id="formGroupExampleInput2" name="drug_time"
                        placeholder="Drug Time">
                </div>
                <div class="mb-3">


                    <textarea type="text" class="form-control mt-4" id="formGroupExampleInput2" name="drug_dosage" placeholder="">Drug Dosage</textarea>
                    <div class="text-center ">
                        <button class="btn btn-primary mt-4 px-4 py-3  ">Add Drug
                        </button>
                    </div>
                </div>
            </form>

            @if (Session::has('drugs'))


                @foreach (Session::get('drugs') as $key => $drug)
                {{-- {{dd($drug)}} --}}
                    <div class='alert alert-dark   ' role='alert'>
                        <p class='d-inline-block w-75'> Drug name: {{ $drug['drug_name'] }} </p>
                        <button class='btn btn-danger ms-auto  d-inline-block'><a
                                class='text-decoration-none text-white ' href='{{ url('deletedrug/' . $key) }}'>
                                delete</a></button>

                    </div>
                @endforeach
            @endif
            <form action="{{ url('make') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary mt-4 px-4 py-3  " name="submit"> Send
                    prescription</button>


            </form>




        </div>
    </div>
</body>

</html>
