@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Stok Barang</h5>
                        <a href="{{ route('stok_barangs.create') }}" class="btn btn-primary btn-sm">Tambah Stok Barang</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Donasi Terima ID</th>
                                    <th>Donasi Penyaluran ID</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stokBarangs as $stokBarang)
                                    <tr>
                                        <td>{{ $stokBarang->id }}</td>
                                        <td>{{ $donasiTerimas->sum('jumlah_donasi') }}</td>
                                        <td>{{ $donasiPenyalurans->sum('donasi_diterima') }}</td>
                                        <td>{{ $donasiTerimas->sum('jumlah_donasi') + $donasiPenyalurans->sum('donasi_diterima')}}</td>
                                        <td>
                                            <a href="{{ route('stok_barangs.show', $stokBarang->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                                            <a href="{{ route('stok_barangs.edit', $stokBarang->id) }}" class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ route('stok_barangs.destroy', $stokBarang->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
