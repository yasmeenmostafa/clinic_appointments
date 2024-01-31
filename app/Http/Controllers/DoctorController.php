<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Prescription;
use App\Models\PrescriptionDrug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    public function doctorview(){
        $doctor_id=Auth::id();
        $data['appointments']=Appointment::where('doctor_id',$doctor_id)->get();
        return view('doctor')->with($data);
    }
    public function delete_appointment($id){
        Appointment::findOrFail($id)->delete();
        return redirect('doctorview')->withSuccess('appointment finished');
    }

    public function prescriptionform(Request $request){
        $data=$request->validate([
            "appointment_id"=>'required|exists:appointments,id',
            "patient_id"=>'required|exists:patients,id',
        ]);
        Session::put('appointment_id',$data['appointment_id']);
        Session::put('patient_id',$data['patient_id']);
       
        return view('make-prescription');

    }
    public function form(){
        return view('make-prescription');

    }
    public function adddrug(Request $request){
      
        $data=$request->validate([
            "drug_name"=>'required|string',
            "drug_time"=>'required|string',
            "drug_dosage"=>'required|string',
        ]);
        Session::push('drugs',$data);
        return redirect('prescription');

    }

    public function deletedrug($key)
    {
        $drugs = Session::get('drugs');
        unset($drugs[$key]);
        Session::put('drugs', $drugs);
        return redirect('prescription')->withSuccess('deleted successfully');
    }

    public function make(){
        // p patient appointment doctor
        //  drugs presci id

        $doctor_id=Auth::id();
        $patient_id = Session::get('patient_id');
        $appointment_id = Session::get('appointment_id');
        $drugs = Session::get('drugs');

       $id= Prescription::insertGetId([
            "patient_id"=>$patient_id,
            "appointment_id"=>$appointment_id,
            "doctor_id"=>$doctor_id,
        ]);
       

        foreach($drugs as $drug){
            // dd($drug);
            PrescriptionDrug::create([
                "drug_name"=>$drug['drug_name'],
                "drug_time"=>$drug['drug_time'],
                "drug_dosage"=>$drug['drug_dosage'],
                "prescription_id"=>$id
            ]);
            
        }
         Session::forget('patient_id');
         Session::forget('appointment_id');
        Session::forget('drugs');

        return redirect('doctorview')->withSuccess('prescription sended successfully');


    }

    
}
