@extends('layouts.app')

@section('content')
    <h1>Data Pesantren</h1>
    <form action="{{ route('pesantrens.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control d-inline-block">
        <button class="btn btn-success d-inline-block">Import Data Anggota</button>
    </form>
    <a href="{{ route('pesantrens.create') }}" class="btn btn-primary">Tambah Pesantren</a>
    <a class="btn btn-warning" href="{{ route('pesantrens.export') }}">Export Data Pesantren</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pesantren</th>
                <th>Alamat</th>
                <th>Jumlah Santri</th>
                <th>Jumlah Muallim</th>
                <th>Jatah Beras*<sup class="text-danger">TON</sup></th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesantrens as $pesantren)
                <tr>
                    <td>{{ $pesantren->id }}</td>
                    <td>{{ $pesantren->nama }}</td>
                    <td>{{ $pesantren->alamat }}</td>
                    <td>{{ $pesantren->jumlah_santri_putera + $pesantren->jumlah_santri_puteri }} </td>
                    <td>{{ $pesantren->jumlah_muallim }}</td>
                    <td>{{ $pesantren->jatah_beras }}</td>
                    <td>
                        <a href="{{ route('pesantrens.show', $pesantren->id) }}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('pesantrens.edit', $pesantren->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('pesantrens.destroy', $pesantren->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
