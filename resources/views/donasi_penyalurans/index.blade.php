@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Donasi Penyaluran</div>

                    <div class="card-body">
                        <form action="{{ route('donasi_penyalurans.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control d-inline-block">
                            <button class="btn btn-success d-inline-block">Import Data Anggota</button>
                        </form>
                        <a class="btn btn-warning" href="{{ route('donasi_penyalurans.export') }}">Export Data Anggota</a>
                        <a href="{{ route('donasi_penyalurans.create') }}" class="btn btn-primary mb-3">Tambah Donasi Penyaluran</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Anggota</th>
                                    <th>Pesantren</th>
                                    <th>Donasi Diterima</th>
                                    <th>Tanggal Penyaluran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donasiPenyalurans as $donasiPenyaluran)
                                    <tr>
                                        <td>{{ $donasiPenyaluran->id }}</td>
                                        <td>{{ $donasiPenyaluran->anggota->nama_anggota }}</td>
                                        <td>{{ $donasiPenyaluran->pesantren->nama }}</td>
                                        <td>{{ $donasiPenyaluran->donasi_diterima }}</td>
                                        <td>{{ $donasiPenyaluran->tanggal_penyaluran }}</td>
                                        <td>
                                            <a href="{{ route('donasi_penyalurans.show', $donasiPenyaluran->id) }}" class="btn btn-primary">Lihat</a>
                                            <a href="{{ route('donasi_penyalurans.edit', $donasiPenyaluran->id) }}" class="btn btn-success">Edit</a>
                                            <form action="{{ route('donasi_penyalurans.destroy', $donasiPenyaluran->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus donasi penyaluran ini?')">Hapus</button>
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
