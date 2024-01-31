<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Prescription_drugs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function view()
    // {
    //     $data['doctors'] = Doctor::all();

    //     return view('index')->with($data);
    // }
    public function show_register()
    {

        return view('register');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:patients,email",
            "phone" => "required|integer",
            "password" => "required|min:5|max:8",
            "address" => "required|string",
            "gender" => "required",
            "birthdate" => "required|before:today",
        ]);
        $data['usertype']='patient';
      
        $user = Patient::create($data);
        Auth::login($user);
        return redirect('/')->withSuccess('registered successfully');
    }

    public function logout()
    {
        Auth::logout();
        // $data['doctors'] = Doctor::all();
        return redirect('/');
    }
    public function loginform()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        // validation 
        $data = $request->validate([

            "email" => "required|email|max:100",
            "password" => "required|string|min:5|max:8"
        ]);
        // check in db and login
        $auth = Patient::where("email", $data['email'])->where("password", $data['password'])->get();
        if (empty($auth[0])){
            return redirect('/loginform')->withErrors("credentials not correct");
        } else {
        $auth = $auth[0];

            Auth::login($auth);
            return redirect("/redirct");
        }
    }

    public function redirct()
    {
        if (Auth::user()->usertype == 'admin') {
            return redirect("dashboard");
        } elseif (Auth::user()->usertype == 'patient') {
            return redirect("home");
            
        } elseif (Auth::user()->usertype == 'doctor') {
            return redirect("doctorview");

        }
        else{
            return redirect("/");

        }

        // php artisan serve
    }
}
