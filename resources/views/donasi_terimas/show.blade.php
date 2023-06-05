<!-- resources/views/donasi_terimas/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Donasi Terima</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $donasiTerima->id }}</td>
                </tr>
                <tr>
                    <th>OTA ID</th>
                    <td>{{ $donasiTerima->ota_id }}</td>
                </tr>
                <tr>
                    <th>Jumlah Donasi</th>
                    <td>{{ $donasiTerima->jumlah_donasi }}</td>
                </tr>
                <tr>
                    <th>Tanggal Donasi</th>
                    <td>{{ $donasiTerima->tanggal_donasi }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
