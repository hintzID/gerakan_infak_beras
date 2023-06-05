@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Anggota</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $anggota->id }}</td>
                </tr>
                <tr>
                    <th>Nama Anggota</th>
                    <td>{{ $anggota->nama_anggota }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $anggota->alamat }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $anggota->email }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td> @if ($anggota->telepon)
                        {{ $anggota->telepon }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td> @if ($anggota->tanggal_lahir)
                        {{ $anggota->tanggal_lahir }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td> @if ($anggota->jenis_kelamin)
                        {{ $anggota->jenis_kelamin }}
                    @else
                        <span class="text-danger">Silahkan diisi lewat tautan <a href="{{ route('anggotas.edit', $anggota->id) }}">edit</a></span>
                        @endif
                    </td>
                </tr>
                <!-- Add other necessary fields -->
            </tbody>
        </table>
    </div>
@endsection
