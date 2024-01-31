<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Contact_request;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function make_appointment(Request $request){
        $data=$request->validate([
            "pname"=>"required|string",
            "pemail"=>"required|email|exists:patients,email",
            "doctor_id"=>"required|exists:patients,id",
            "gender"=>"required|in:male,female",
            "date"=>"required|after:today",
            "time"=>"required"
        ]);
        $pemail=$data['pemail'];
        $patient=Patient::where('email',$pemail)->get();
        $data['patient_id']=$patient[0]['id'];

        Appointment::create($data);
       
        return redirect('home')->withSuccess('make appointment successfully');
    }

//   ------------
    public function show(){
        $id=Auth::id();
        // db
        $data['prescriptions']=Prescription::join('prescription_drugs', 'prescription_drugs.prescription_id', '=', 'prescriptions.id')
        ->where('Patient_id',$id)->get();
        
        $data['appointments']=Appointment::where('patient_id',$id)->get();

        
        return view('patient')->with($data);
    }

    public function contactus(Request $request){
        $data=$request->validate([
            "name"=>"required|string",
            "phone"=>"required|string",
            "message"=>"required|string",
        ]);
        
        
        Contact_request::create($data);
        return redirect('home')->withSuccess('message sended successfully');
    }

    public function home(){
        $data['doctors']=Patient::where('usertype','doctor')->get();
        return view("index")->with($data);
    }


}
