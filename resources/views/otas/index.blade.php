@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Otas</h1>

    <a href="{{ route('otas.create') }}" class="btn btn-primary btn-sm">Tambah Otas</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Fundraiser</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($otas as $otasItem)
                <tr>
                    <td>{{ $otasItem->id }}</td>
                    <td>{{ $otasItem->nama }}</td>
                    <td>{{ $otasItem->anggota->nama_anggota }}</td>
                    <td>
                        <a href="{{ route('otas.show', $otasItem->id) }}" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{ route('otas.edit', $otasItem->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('otas.destroy', $otasItem->id) }}" method="POST" style="display: inline;">
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
@endsection
