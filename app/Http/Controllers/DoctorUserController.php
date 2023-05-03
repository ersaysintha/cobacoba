<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorUserController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
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

        return view('doctors.search', ['doctors' => $doctors , 'date' => $date]);
    }
}
