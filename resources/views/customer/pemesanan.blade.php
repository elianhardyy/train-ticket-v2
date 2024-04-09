@extends('layout.app')
{{-- <style>
    input {
         outline: 0;
         border-width: 0 0 2px;
         border-color: grey;
      }
</style> --}}
@section('customer')
@for ($i=0; $i<$jumpenum; $i++)
<form action="{{ route('pemesanan') }}" method="POST">
@csrf
<input type="hidden" name="users_id[]" value="{{ auth()->user()->id }}">
<input type="hidden" name="penumpang_id[]" value="{{ $idpenum->id }}">
<input type="hidden" name="harga[]" value="{{ $idpenum->kereta->harga }}">
<input type="hidden" name="tanggal[]" value="{{ now()}}">
<input type="hidden" name="uuid[]" value="{{ Str::uuid() }}">
@if ($i == 0)
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>{{ $idpenum->kereta->nama_kereta }}</h3>
        </div>
        <div class="card-body">
            <label for="username">Nama</label>
            <input type="text" name="username[]" value="{{ auth()->user()->first_name . " " . auth()->user()->last_name }}" class="form-control">
            <label for="phone">NIK</label>
            <input type="text" name="nik[]" value="{{ auth()->user()->nik }}" class=" form-control">
            
            <label for="phone">Alamat</label>
            <input type="text" name="alamat[]" value="{{ auth()->user()->address }}"class="form-control">
            <label for="phone">Nomor Kursi</label>
            <div class="input-group mb-3">
                <input type="number" name="nomor_kursi[]" id="" value="{{ $randomNum }}" class="form-control">
                @if ($idpenum->kereta->kelas == 'Ekonomi')
                <select name="huruf_kursi[]" id="" class="form-select">
                    <option value="{{ $randomHuruf }}" selected>{{ $randomHuruf }}</option>
                    <option value="" disabled>--------------------</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                @else
                <select name="huruf_kursi[]" id="" class="form-select">
                    <option value="{{ $randomHuruf }}" selected>{{ $randomHuruf }}</option>
                    <option value="" disabled>--------------------</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                @endif
            </div>
            
            <label for="phone">Gerbong</label>
            <div class="input-group mb-3">
                <input type="text" name="jenis_gerbong[]" class="input-group-text" value="{{ substr($idpenum->kereta->kelas,0,3) }}">
                <input type="number" name="gerbong[]" value="{{ $randomGerbong }}" class="form-control" min="1" max="20">
            </div>
        </div>
    </div>
</div>
@continue
@endif
<div class="row">
    <div class="card">
        <div class="card-header">
            <h3>{{ $idpenum->kereta->nama_kereta }}</h3>
        </div>
        <div class="card-body">
            <label for="mame">Nama</label>
            <input type="text" name="username[]" class=" form-control" required>
            <label for="phone">NIK</label>
            <input type="text" name="nik[]" class=" form-control">
            <label for="phone">Alamat</label>
            <input type="text" name="alamat[]" class="form-control">
            <label for="phone">Nomor Kursi</label>
            <div class="input-group mb-3">
                <input type="number" name="nomor_kursi[]" id="" value="{{ $randomNum }}" class="form-control">
                @if ($idpenum->kereta->kelas == 'Ekonomi')
                <select name="huruf_kursi[]" id="" class="form-select">
                    <option value="{{ $randomHuruf }}" selected>{{ $randomHuruf }}</option>
                    <option value="" disabled>--------------------</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                @else
                <select name="huruf_kursi[]" id="" class="form-select">
                    <option value="{{ $randomHuruf }}" selected>{{ $randomHuruf }}</option>
                    <option value="" disabled>--------------------</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
                @endif
            </div>
            <label for="phone">Gerbong</label>
            <div class="input-group mb-3">
                <input type="text" name="jenis_gerbong[]" class="input-group-text" value="{{ substr($idpenum->kereta->kelas,0,3) }}">
                <input type="number" name="gerbong[]" value="{{ $randomGerbong }}" class="form-control" min="1" max="20">
            </div>
        </div>
    </div>
</div>
@endfor
<button type="submit" class="btn btn-primary">Pesan</button>
</form>
@endsection