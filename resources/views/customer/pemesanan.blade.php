@extends('layout.app')
<style>
    input {
         outline: 0;
         border-width: 0 0 2px;
         border-color: grey;
      }
</style>
@section('customer')
@for ($i=0; $i<$jumpenum; $i++)
<form action="{{ route('pemesanan') }}" method="POST">
@csrf
<input type="text" name="users_id[]" value="{{ auth()->user()->id }}">
<input type="text" name="penumpang_id[]" value="{{ $idpenum->id }}">
<input type="hidden" name="harga[]" value="1">
<input type="text" name="tanggal[]" value="{{ now()}}">
@if ($i == 0)
<div class="row">
    <div class="card">
        <div class="card-header">
            <label for="mame">Nama</label>
            <input type="text" name="username[]" value="{{ auth()->user()->name }}">
        </div>
        <div class="card-body">
            <label for="phone">NIK</label>
            <input type="text" name="nik[]" value="{{ auth()->user()->nik }}">
            <label for="phone">Alamat</label>
            <input type="text" name="alamat[]" value="{{ auth()->user()->address }}">
            <input type="text" name="nomor_kursi[]" id="" value="{{ $randomNum . $randomHuruf }}">
            <input type="text" name="gerbong[]" value="{{ substr($idpenum->kereta->kelas,0,3) }} - {{ $randomGerbong }}">
        </div>
    </div>
</div>
@continue
@endif
<div class="row">
    <div class="card">
        <div class="card-header">
            <label for="mame">Nama</label>
            <input type="text" name="username[]">
        </div>
        <div class="card-body">
            <label for="phone">NIK</label>
            <input type="text" name="nik[]">
            <label for="phone">Alamat</label>
            <input type="text" name="alamat[]">
            <input type="text" name="nomor_kursi[]" id="" value="{{ $randomNumOthers . $randomHurufOthers }}">
            <input type="text" name="gerbong[]" value="{{ substr($idpenum->kereta->kelas,0,3) }} - {{ $randomGerbongOthers }}">
        </div>
    </div>
</div>
@endfor
<button type="submit" class="btn btn-primary">Pesan</button>
</form>
@endsection