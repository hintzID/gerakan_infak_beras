@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Anggota</h1>
        <form action="{{ route('anggotas.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ $anggota->nama_anggota }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $anggota->email }}" required>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $anggota->telepon }}">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="L" @if($anggota->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if($anggota->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <!-- Add other necessary fields -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
