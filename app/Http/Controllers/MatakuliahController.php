<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matakuliah = Matakuliah::all();
        return view('matakuliah.index', compact('matakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk' => 'required|unique:matakuliahs,kode_mk',
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        Matakuliah::create($validated);
        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $kode_mk)
    {
        $validated = $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        $matakuliah = Matakuliah::findOrFail($kode_mk);
        $matakuliah->update($validated);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode_mk)
    {
        $matakuliah = Matakuliah::findOrFail($kode_mk);
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
