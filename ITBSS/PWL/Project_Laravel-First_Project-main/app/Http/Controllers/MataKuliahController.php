<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('IndexMataKuliah', ['matakuliah' => MataKuliah::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosens = Dosen::all();
        return view('CreateMataKuliah', compact('dosens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kodemk'  => 'required|unique:matakuliah,kodemk',
            'namamk'  => 'required',
            'kodemk'  => 'required',
        ]);

        \App\Models\MataKuliah::create($request->all());

        return redirect('/matakuliah')->with('success', 'Mata Kuliah Berhasil Ditambahkan');
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
    public function edit(string $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        $dosens = Dosen::all();
        return view('CreateMataKuliah', compact('matakuliah', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        $request->validate([
            'kodemk'   => 'required|unique:matakuliah,kodemk,' . $id,
            'namamk'   => 'required',
            'jurusan'  => 'required',
        ]);

        $matakuliah->update($request->all());
        return redirect('/matakuliah')->with('success','Data Mata Kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);
        $matakuliah->delete();

        return redirect('/matakuliah')->with('success','Data Mata Kuliah berhasil dihapus.');
    }
}
