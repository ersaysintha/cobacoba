<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Schedule;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){

        $doctor = Doctor::all();
        $obat  = count(Medicine::all());
        $appointment = count(Appointment::all());
        $schedule = count(Schedule::all());
        $bpjs = count(Appointment::where('status' , 'done, medicine payment bpjs completed')->get());
        $regular =  count(Appointment::where('status' , 'done, medicine payment regular completed')->get());

        return view('home' , ['doctor' => count($doctor) , 'obat'=>$obat  , 'appointment' => $appointment
            ,'schedule' => $schedule , 'bpjs' => $bpjs , 'regular' => $regular ]);
    }

    public function medicine(){
        $medicine = Medicine::all();
        return view('mdeicine' , compact('medicine'));
    }

    public function searchMed(Request $request){
        $medicine = Medicine::where('name', 'like', '%'.$request->search.'%')->get();

        return view('mdeicine' , compact('medicine'));
    }
}
