<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CarStoreRequest;

class CarController extends Controller
{
    public function index()
    {
        // Kode logika untuk mengambil dan menampilkan daftar mobil
        $cars = Car::latest()->get();
        
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        // Kode logika untuk menambah data
        return view('admin.cars.create');
    }

    public function show()
    {
        // Kode logika untuk menampilkan detail mobil berdasarkan ID
    }

    public function store(CarStoreRequest $request)
    {
        // Kode logika untuk menyimpan data mobil yang dikirimkan melalui form
        if($request->validate()){
            $gambar = $request->file('gambar')->store('
            gambar/cars', 'public');

            Car::create($request->except('gambar') + ['gambar' => $gambar]);
        }

        return redirect()->route('cars.index')->with([
            'message' => 'datasukses dibuat',
            'alert-type' => 'success'
        ]);
    }

    public function update(Request $request, $id)
    {
        // Kode logika untuk memperbarui data mobil berdasarkan ID yang dikirimkan melalui form
    }

    public function destroy($id)
    {
        // Kode logika untuk menghapus mobil berdasarkan ID
    }
}