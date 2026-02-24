<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('matakuliah')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $matakuliah = Matakuliah::all();
        return view('mahasiswa.create', compact('matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'kelas' => 'required',
            'kode_mk' => 'required'
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $matakuliah = Matakuliah::all();

        return view('mahasiswa.edit', compact('mahasiswa','matakuliah'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'kode_mk' => 'required'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil dihapus');
    }
}