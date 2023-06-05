@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Anggota</h1>
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
