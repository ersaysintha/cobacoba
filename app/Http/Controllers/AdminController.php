<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $doctor = Doctor::all();
        $obat  = count(Medicine::all());
        $appointment = count(Appointment::all());
        $schedule = count(Schedule::all());
        $bpjs = count(Appointment::where('status' , 'done, medicine payment bpjs completed')->get());
        $regular =  count(Appointment::where('status' , 'done, medicine payment regular completed')->get());

        $doctors = Doctor::all();
        $doctorData = [];
        $scheduleData = [];
        foreach ($doctors as $x) {
            $doctorData[] = $x->name;
            $scheduleData[] = count($x->schedules);
        }


        return view('admin.dashboard' , ['doctor' => count($doctor) , 'obat'=>$obat  , 'appointment' => $appointment
        ,'schedule' => $schedule , 'bpjs' => $bpjs , 'regular' => $regular , 'doctorData' => $doctorData , 'scheduleData' => $scheduleData]);
    }
}
