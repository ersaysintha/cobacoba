<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Auth::user()->appointments;
        return view('appointment.index', compact('appointments'));
    }

    public function payment(){
        $appointments = Auth::user()->appointments()->where('status', 'accepted , waiting for payment')->get();
        return view('appointment.payment', compact('appointments'));
    }
    public function scheduled(){
        $appointments = Auth::user()->appointments()->where('status', 'scheduled , payment')->orWhere('status', 'scheduled , bpjs
')->get();

        return view('appointment.scheduled', compact('appointments'));
    }

    public function adminSchedule(){
        $appointments =Appointment::where('status', 'scheduled , payment')->orWhere('status', 'scheduled , bpjs
')->get();


        return view('admin.appointment.schedule', compact('appointments'));
    }

    public function scheduledReciptRegular(){
        $appointments =Appointment::where('status', 'done, regular')->get();


        return view('admin.appointment.reciptRegular', compact('appointments'));
    }

    public function scheduleReciptBpjs(){
        $appointments =Appointment::where('status', 'done, Bpjs')->get();


        return view('admin.appointment.reciptBpjs', compact('appointments'));
    }



    public function bpjs(Request $request , $appointment_id){
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->claim_bpjs = $request->bpjs_no;
        $appointment->status = 'claim bpjs, completed';
        $appointment->save();

        return redirect()->back()->with('success', 'Payment proof uploaded successfully');
    }


    public function upload(Request $request, $appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);

        // Upload file
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('payment_proofs', $filename);

            // Update appointment
            $appointment->bukti_pembayaran = $filename;
            $appointment->status = 'payment, completed';
            $appointment->save();

            return redirect()->back()->with('success', 'Payment proof uploaded successfully');
        } else {
            return redirect()->back()->with('error', 'Please select a file to upload');
        }
    }


    public function scheduleAppointment(Request $request)
    {
        $schedule = Schedule::findOrFail($request->schedule_id);
        $user = Auth::user();


        if ($schedule->isBooked()) {
            return redirect()->back()->with('error', 'This schedule is already booked.');
        }

        $appointment = new Appointment([
            'status' => 'pending' ,
            'doctor_id' => $schedule->doctor_id,
            'patient_id' => $user->id ,
            'date_time' => $request->date_time ,
        ]);

        $appointment->schedule_id = $request->schedule_id;

        $appointment->save();


        return redirect()->back()->with('success', 'Your appointment request has been sent.');
    }


    public function indexAdmin()
    {
        // Menampilkan daftar appointment yang masih dalam status pending
        $appointments = Appointment::where('status', 'pending')->get();
        return view('admin.appointment.index', compact('appointments'));
    }

    public function acc(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        // Validasi jika appointment tidak ditemukan atau sudah dalam status selain 'pending'
        if (!$appointment || $appointment->status != 'pending') {
            return redirect()->back()->with('error', 'Invalid appointment');
        }

        // Update status appointment menjadi 'accepted' dan menyimpan fee yang dimasukkan oleh admin
        $appointment->status = 'accepted , waiting for payment';
        $appointment->fee = $request->fee;
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment accepted');
    }

    public function paymentAcc(){
        // Menampilkan daftar appointment yang masih dalam status pending
        $appointments = Appointment::where('status', 'payment, completed')->get();

        return view('admin.appointment.payment', compact('appointments'));
    }

    public function paymentBpjs(){
        // Menampilkan daftar appointment yang masih dalam status pending
        $appointments = Appointment::where('status', 'claim bpjs, completed')->get();


        return view('admin.appointment.paymentBpjs', compact('appointments'));
    }

    public function accPayment($id , Request $request){
        $appointment = Appointment::find($id);


        $appointment->no_wa = $request->no_wa;
        $appointment->status = 'scheduled , payment';
        $appointment->save();

        return redirect()->back();
    }

    public function doneRegular($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'done, regular';
        $appointment->save();

        return redirect()->back();
    }

    public function doneBpjs($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'done, BPJS';
        $appointment->save();

        return redirect()->back();
    }

}
