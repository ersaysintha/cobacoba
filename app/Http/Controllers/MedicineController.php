<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Str;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('admin.medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {

        $medicine = new Medicine;
        $medicine->name = $request->name;
        $medicine->description = $request->description;
        $medicine->price = $request->price;
        $medicine->stock = $request->stock;

        // cek apakah ada file yang diupload
        if ($request->hasFile('photo')) {
            // ambil file yang diupload
            $file = $request->file('photo');
            // generate nama file baru dengan ekstensi asli
            $filename = time() . '_' . str_replace(' ', '_', strtolower($file->getClientOriginalName()));
            // simpan file ke storage
            $file->move('medicinePhoto', $filename);
            // simpan nama file ke database
            $medicine->photo = $filename;
        }




        $medicine->save();
        return redirect()->route('medicines.index')->with('success', 'Medicine has been added.');
    }

    public function edit(Medicine $medicine)
    {
        return view('admin.medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $medicine->name = $request->input('name');
        $medicine->description = $request->input('description');
        $medicine->price = $request->input('price');
        $medicine->stock = $request->input('stock');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $file->move('medicinePhoto', $filename);
            $medicine->photo = $filename;
        }

        $medicine->save();

        return redirect()->route('medicines.index')->with('success', 'Medicine has been updated.');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine has been deleted.');
    }
}
