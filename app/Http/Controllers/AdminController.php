<?php

namespace App\Http\Controllers;

use App\Models\Contact_request;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard(){
        $data['messages']=Contact_request::all();
        $data['doctors']=Patient::where('usertype','doctor')->get();
        return view('admin')->with($data);
    }


    // -------------------
    public function deletedoctor($id){
       Patient::findOrFail($id)->delete();
        return redirect('dashboard')->withSuccess('doctor deleted');
    }
    public function deletemessage($id){
        Contact_request::findOrFail($id)->delete();
         return redirect('dashboard')->withSuccess('message deleted');
     }


     

    public function add_doctor(Request $request){

        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|integer",
            "password" => "required|min:5|max:8",
            "address" => "required|string",
            "gender" => "required",
            "birthdate" => "required|before:today",
        ]);
        $data['usertype']='doctor';
        
         Patient::create($data);
       
        return redirect('dashboard')->withSuccess('doctor added successfully');
    
        
     }
    
     
}
