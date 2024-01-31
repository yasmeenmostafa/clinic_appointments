
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/css/register.css')}}">
    

    <title>Register</title>
</head>

<body>
    <div>

        <nav id="no">

            <h1>clinic</h1>
            <button type="button"><a href="{{url('loginform')}}">Login</a></button>
        </nav>
    </div>

    <div class=" parent">
        <div class="img1">
            <img src="{{asset('images/home_img_wrap.png')}}" alt="wrap">
        </div>
        <div>
            <form method="post" action="{{url('/store')}}" >
                @csrf
                <h1>Register</h1>
               
                @include('inc.errors')
               
                <input type="text" class="input" placeholder="Name" name="name"><br>
                <input type="text" class="input" placeholder="Email" name="email"><br>
                <input type="password" class="input" placeholder="password"name="password"><br>
                <input type="text" class="input" placeholder="phone"name="phone"><br>
                <input type="text"class="input" placeholder="address"name="address"><br>
                <input type="date"class="input" placeholder="birthdate" max="2023-12-5" name="birthdate"><br>
                <div class="gender">
                <span>gender:</span>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">female</label>
                </div>
               <button class="register" name="submit">Register</button>
                <h2>Already have an account ? <span><a href="{{url('loginform')}}">login Now</a></span></h2>
            </form>

        </div>

    </div>
</body>

</html>