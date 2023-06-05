@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Anggota Baru</h1>
        <form action="{{ route('anggotas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Add other necessary fields -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
