<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller

{
    public function index()
    {
        $anggotas = Anggota::all();
        return view('anggotas.index', compact('anggotas'));
    }
    
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggotas.view', compact('anggota'));
    }    

    public function create()
    {
        return view('anggotas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:anggotas,email',
            // 'telepon' => 'nullable',
            // 'tanggal_lahir' => 'nullable',
            // 'jenis_kelamin' => 'nullable'

            // Ensure email uniqueness in the "anggotas" table
            // Add validation rules for other required fields
        ]);
    
        Anggota::create([
            'nama_anggota' => $request->nama_anggota,
            'alamat' => $request->alamat,
            'email' => $request->email,
            // 'telepon' => $request->telepon,
            // 'tanggal_lahir' => $request->tanggal_lahir,
            // 'jenis_kelamin' => $request->jenis_kelamin,
            // Add data for other required fields
        ]);
    
        return redirect()->route('anggotas.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }
    

    public function edit($id)
    {   
        
        $anggota = Anggota::findOrFail($id);
        return view('anggotas.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:anggotas,email,'.$id,
            'telepon' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            // Add validation for other necessary fields
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update([
            'nama_anggota' => $request->nama_anggota,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            // Update other necessary fields
        ]);

        return redirect()->route('anggotas.index')
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
    
        return redirect()->route('anggotas.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
    
}
