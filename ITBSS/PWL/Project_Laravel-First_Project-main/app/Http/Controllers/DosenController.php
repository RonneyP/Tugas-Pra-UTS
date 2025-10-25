<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        return view('IndexDosen', ['dosens' => Dosen::all()]);
    }

     public function create()
    {
        return view('Createdosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP'           => 'required|unique:dosen',
            'Nama'          => 'required',
            'Pendidikan_Terakhir'  => 'required',
        ]);

        \App\Models\Dosen::create($request->all());

        return redirect('/dosen')->with('success', 'dosen Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('CreateDosen', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $request->validate([
            'NIP'           => 'required|unique:dosen,NIP,' . $id,
            'Nama'          => 'required',
            'Pendidikan_Terakhir'  => 'required',
        ]);

        $dosen->update($request->all());
        return redirect('/dosen')->with('success','Data dosen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect('/dosen')->with('success','Data Dosen berhasil dihapus.');
    }
}
