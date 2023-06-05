<?php

namespace App\Http\Controllers;

use App\Models\Pesantren;
use Illuminate\Http\Request;

class PesantrenController extends Controller
{
    public function index()
    {
        $pesantrens = Pesantren::all();
        return view('pesantrens.index', compact('pesantrens'));
    }

    public function create()
    {
        return view('pesantrens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah_santri_putera' => 'required|integer',
            'jumlah_santri_puteri' => 'required|integer',
            'jumlah_muallim' => 'required|integer',
            'jatah_beras' => 'required',
        ]);

        Pesantren::create($request->all());

        return redirect()->route('pesantrens.index')
            ->with('success', 'Data Pesantren berhasil ditambahkan.');
    }

    public function edit(Pesantren $pesantren)
    {
        return view('pesantrens.edit', compact('pesantren'));
    }

    public function update(Request $request, Pesantren $pesantren)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jumlah_santri_putera' => 'required|integer',
            'jumlah_santri_puteri' => 'required|integer',
            'jumlah_muallim' => 'required|integer',
            'jatah_beras' => 'required',
        ]);

        $pesantren->update($request->all());

        return redirect()->route('pesantrens.index')
            ->with('success', 'Data Pesantren berhasil diperbarui.');
    }

    public function destroy(Pesantren $pesantren)
    {
        $pesantren->delete();

        return redirect()->route('pesantrens.index')
            ->with('success', 'Data Pesantren berhasil dihapus.');
    }

    public function show(Pesantren $pesantren)
    {
        return view('pesantrens.show', compact('pesantren'));
    }
}
