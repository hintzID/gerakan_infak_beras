@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div>
                   <div class="bg-primary" style="width: {{ $anggotas->count('nama_anggota') + 100}}px;">
Jumlah Anggota Paskas =  {{ $anggotas->count('nama_anggota') }}  <br></div> <div class="bg-warning">Jumlah Ota = {{ $otas->count('nama') }} <br></div> <div class="bg-danger">Jumlah Pesantren = {{  $pesantrens->count('nama') }} <br></div>
                </div>
{{-- //kontributor --}}
  
  
  

  {{-- //resources --}}
  Jumlah Total Donasi = {{  $a = $donasiTerimas->sum('jumlah_donasi') }} <br>
  Jumlah Donasi Di salurkan = {{  $b = $donasiPenyalurans->sum('donasi_diterima') }} <br>
  Stok Beras = {{ $a + $b}}
    

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
