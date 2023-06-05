<!-- resources/views/donasi_terimas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Donasi Terima</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <form action="{{ route('donasi_terimas.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control d-inline-block">
                <button class="btn btn-success d-inline-block">Import Data Anggota</button>
            </form>
            <a class="btn btn-warning" href="{{ route('donasi_terimas.export') }}">Export Data Anggota</a>
            <a href="{{ route('donasi_terimas.create') }}" class="btn btn-primary">Tambah Donasi Terima</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Donatur</th>
                    <th>Penerima*<sup>mas'ul</sup></th>
                    <th>Jumlah Donasi</th>
                    <th>Tanggal Donasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donasiTerimas as $donasiTerima)
                    <tr>
                        <td>{{ $donasiTerima->id}}</td>
                        <td>{{ $donasiTerima->ota->nama }}</td>
                        <td>{{ $donasiTerima->anggota->nama_anggota }}</td>
                        <td>{{ $donasiTerima->jumlah_donasi }}</td>
                        <td>{{ $donasiTerima->tanggal_donasi }}</td>
                        <td>
                            <a href="{{ route('donasi_terimas.show', $donasiTerima->id) }}" class="btn btn-primary">Detail</a>
                            <a href="{{ route('donasi_terimas.edit', $donasiTerima->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('donasi_terimas.destroy', $donasiTerima->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus donasi terima ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
