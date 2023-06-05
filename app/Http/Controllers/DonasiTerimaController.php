<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ota;
use Illuminate\Http\Request;
use App\Models\DonasiTerima;

class DonasiTerimaController extends Controller
{
    public function index()
    {   
        $donasiTerimas = DonasiTerima::all();

        return view('donasi_terimas.index', compact('donasiTerimas'));
    }

    public function create()
    {   
        $donasiTerimas = DonasiTerima::all();
        $anggotas = Anggota::all();
        $otas = Ota::all();
        return view('donasi_terimas.create', compact('donasiTerimas','anggotas','otas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ota_id' => 'required',
            'anggota_id' => 'required',
            'jumlah_donasi' => 'required',
            'tanggal_donasi' => 'required',
        ]);

        DonasiTerima::create($request->all());

        return redirect()->route('donasi_terimas.index')
            ->with('success', 'Donasi terima berhasil ditambahkan.');
    }

    public function show($id)
    {
        $donasiTerima = DonasiTerima::findOrFail($id);
        return view('donasi_terimas.show', compact('donasiTerima'));
    }

    public function edit($id)
    {
        $donasiTerima = DonasiTerima::findOrFail($id);
        return view('donasi_terimas.edit', compact('donasiTerima'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ota_id' => 'required',
            'jumlah_donasi' => 'required',
            'tanggal_donasi' => 'required',
        ]);

        $donasiTerima = DonasiTerima::findOrFail($id);
        $donasiTerima->update($request->all());

        return redirect()->route('donasi_terimas.index')
            ->with('success', 'Donasi terima berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $donasiTerima = DonasiTerima::findOrFail($id);
        $donasiTerima->delete();

        return redirect()->route('donasi_terimas.index')
            ->with('success', 'Donasi terima berhasil dihapus.');
    }
}
