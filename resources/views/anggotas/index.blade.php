@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Anggota</h1>
        <div class="float-end">
            <div class="d-inline-block">
                <form action="{{ route('anggotas.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control d-inline-block">
                    <button class="btn btn-success d-inline-block">Import Data Anggota</button>
                </form>
            </div>
            <div class="d-inline-block">
                <a class="btn btn-warning" href="{{ route('anggotas.export') }}">Export Data Anggota</a>
            </div>
        </div>
        <a href="{{ route('anggotas.create') }}" class="btn btn-primary mb-2">Tambah Anggota</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggotas as $anggota)
                <tr>
                    <td>{{ $anggota->id }}</td>
                    <td>{{ $anggota->nama_anggota }}</td>
                    <td>{{ $anggota->alamat }}</td>
                    <td>
                        <a href="{{ route('anggotas.show', $anggota->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('anggotas.edit', $anggota->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
