<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.schedule.index', compact('doctors'));
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date_format:Y-m-d',
        ]);
        $date = $request->date;


        $doctors = Doctor::whereHas('schedules', function($query) use($validatedData) {
            $query->whereDate('date_time', $validatedData['date'])
                ->whereDay('date_time', Carbon::parse($validatedData['date'])->day);
        })->get();

        return view('admin.schedule.search', ['doctors' => $doctors , 'date' => $date]);
    }
    public function create()
    {
        return view('schedule.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'datetime' => 'required|date_format:Y-m-d\TH:i',
        ]);

        // Simpan data jadwal booking
        $schedule = new Schedule();
        $schedule->doctor_id = $request->input('doctor_id');
        $schedule->date_time = $request->input('datetime');
        $schedule->save();

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Jadwal booking berhasil ditambahkan');
    }


    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validatedData = $request->validate([
            'date_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $schedule->date_time = Carbon::parse($validatedData['date_time']);
        $schedule->save();

        return redirect()->route('schedule.index', $schedule->doctor_id)
            ->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Doctor deleted successfully');
    }
}
