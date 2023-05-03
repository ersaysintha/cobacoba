<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\AppointmentMedicine;
use App\Models\Medicine;
use Illuminate\Http\Request;

class AppointmentMedicineController extends Controller
{
    public function index($id){
        $data = AppointmentMedicine::where('appointment_id' , $id)->get();
        $medicines = Medicine::all();
        $appointmet = $id;

        return view('admin.appointment.med' , ['data'=>$data , 'medicines'=>$medicines , 'appointment'=>$id]);
    }



    public function indexBpjs($id){
        $data = AppointmentMedicine::where('appointment_id' , $id)->get();
        $medicines = Medicine::all();
        $appointmet = $id;

        return view('admin.appointment.medBpjs' , ['data'=>$data , 'medicines'=>$medicines , 'appointment'=>$id]);
    }


    public function reciptRegular($id){
        $data = Appointment::find($id);
        $data->status = 'done, medicine payment regular';
        $data->save();

        return redirect()->back()->with('success' , 'berhasil mengirimkan recipt');
    }

    public function reciptBpjs($id){
        $data = Appointment::find($id);
        $data->status = 'done, medicine payment bpjs';
        $data->save();

        return redirect()->back()->with('success' , 'berhasil mengirimkan recipt bpjs');
    }

    public function userReciptRegular(){
        $appointments =Appointment::where('status', 'done, medicine payment regular')->get();

        return view('recipt.reciptRegular', compact('appointments'));
    }
    public function userReciptBpjs(){
        $appointments =Appointment::where('status', 'done, medicine payment Bpjs')->get();

        return view('recipt.reciptBpjs', compact('appointments'));
    }

    public function userReciptIndexRegular($id){
        $data = AppointmentMedicine::where('appointment_id' , $id)->get();
        $medicines = Medicine::all();
        $appointmet = $id;

        return view('recipt.reciptRegularList' , ['data'=>$data , 'medicines'=>$medicines , 'appointment'=>$id]);
    }

    public function userReciptIndexBpjs($id){
        $data = AppointmentMedicine::where('appointment_id' , $id)->get();
        $medicines = Medicine::all();
        $appointmet = $id;

        return view('recipt.reciptBpjsList' , ['data'=>$data , 'medicines'=>$medicines , 'appointment'=>$id]);
    }

    public function add(Request $request){

        $medicine = Medicine::find($request->medicine_id);
        if ($medicine->stock < $request->quantity){
            return redirect()->back()->with('success' , 'stock hanya ' . $medicine->stock);
        }else{

        }
        $data = new AppointmentMedicine();
        $data->appointment_id = $request->appointment_id;
        $data->medicine_id = $request->medicine_id;
        $data->quantity = $request->quantity;
        $medicine->stock = $medicine->stock - $data->quantity;
        $medicine->update();
        $data->save();

        return  redirect()->back();

    }

    public function doneReciptRegular($id){
        $data = Appointment::find($id);
        $data->status = 'done, medicine payment regular completed';
        $data->save();

        return redirect()->back()->with('success' , 'berhasil membayar recipt');
    }

    public function doneReciptBpjs($id){
        $data = Appointment::find($id);
        $data->status = 'done, medicine payment bpjs completed';
        $data->save();

        return redirect()->back()->with('success' , 'berhasil membayar recipt bpjs');
    }
}
