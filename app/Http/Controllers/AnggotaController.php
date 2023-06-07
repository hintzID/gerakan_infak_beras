<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Exports\AnggotasExport;
use App\Imports\AnggotasImport;

use Maatwebsite\Excel\Facades\Excel;

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
            'telepon' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'seksi_paskas' => 'nullable',
            'status' => 'nullable',
            'pekerjaan' => 'nullable',
            'komunitas_diikuti' => 'nullable',
            'tentang_paskas' => 'nullable',
            'kesanggupan' => 'nullable',
            'harapan' => 'nullable',
        ]);
    
        $anggota = new Anggota();
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->alamat = $request->alamat;
        $anggota->email = $request->email;
        $anggota->telepon = $request->telepon;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->seksi_paskas = $request->seksi_paskas;
        $anggota->status = $request->status;
        $anggota->pekerjaan = $request->pekerjaan;
        $anggota->komunitas_diikuti = $request->komunitas_diikuti;
        $anggota->tentang_paskas = $request->tentang_paskas;
        $anggota->kesanggupan = $request->kesanggupan;
        $anggota->harapan = $request->harapan;
    
        $anggota->save();
    
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
            'tanggal_lahir' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'seksi_paskas' => 'nullable',
            'status' => 'nullable',
            'pekerjaan' => 'nullable',
            'komunitas_diikuti' => 'nullable',
            'tentang_paskas' => 'nullable',
            'kesanggupan' => 'nullable',
            'harapan' => 'nullable',
        ]);
    
        $anggota = Anggota::findOrFail($id);
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->alamat = $request->alamat;
        $anggota->email = $request->email;
        $anggota->telepon = $request->telepon;
        $anggota->tanggal_lahir = $request->tanggal_lahir;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->seksi_paskas = $request->seksi_paskas;
        $anggota->status = $request->status;
        $anggota->pekerjaan = $request->pekerjaan;
        $anggota->komunitas_diikuti = $request->komunitas_diikuti;
        $anggota->tentang_paskas = $request->tentang_paskas;
        $anggota->kesanggupan = $request->kesanggupan;
        $anggota->harapan = $request->harapan;
    
        $anggota->save();
    
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

    public function export()
    {
        return Excel::download(new AnggotasExport, 'anggotas.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        Excel::import(new AnggotasImport, $request->file('file'));

        return redirect()->route('anggotas.index')->with('success', 'Data anggota berhasil diimport.');
    }

    
}
